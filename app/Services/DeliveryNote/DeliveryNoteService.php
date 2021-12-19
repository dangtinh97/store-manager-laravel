<?php

namespace App\Services\DeliveryNote;

use App\Http\Responses\ApiResponse;
use App\Http\Responses\ResponseError;
use App\Http\Responses\ResponseSuccess;
use App\Models\Bill;
use App\Models\Contract;
use App\Models\Project;
use App\Repositories\Bill\BillRepositoryInterface;
use App\Repositories\Contract\ContractRepositoryInterface;
use App\Repositories\Project\ProjectRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class DeliveryNoteService implements DeliveryNoteServiceInterface
{
    protected $billRepository;
    protected $projectRepository;
    protected $contractRepository;

    public function __construct(BillRepositoryInterface $billRepository,
                                ProjectRepositoryInterface $projectRepository,
    ContractRepositoryInterface $contractRepository
    )
    {
        $this->billRepository = $billRepository;
        $this->projectRepository = $projectRepository;
        $this->contractRepository = $contractRepository;
    }

    public function store(array $params): ApiResponse
    {
        $projectId = (int)$params['project_id'];
        $quantity = (int)$params['quantity'];
        $project = $this->projectRepository->findById($projectId);
        $contract = $this->contractRepository->findFirst([
            'project_id' => $projectId
        ]);
        if ($project->quantity - $project->order < $quantity) return new ResponseError();
       $create = $this->billRepository->create([
            'admin_id' => Auth::id(),
            'project_id' => $project->id,
            'price' => $project->price,
            'quantity' => $quantity,
            'name_bill' => "",
            "status" => Bill::STATUS_BILL_NEW
        ]);
        if($quantity===$project->quantity - $project->order){
            $contract->update([
                'status' => Contract::STATUS_COMPLETED
            ]);
            $project->update([
                'status' => Project::STATUS_COMPLETED
            ]);
        }else{
            $contract->update([
                'status' => Contract::STATUS_ACTIVE
            ]);
        }
        $project->increment('order',$quantity);

        return new ResponseSuccess([
            'id' => $create->id
        ]);
    }

    public function list()
    {
        return $this->billRepository->getAll();
    }

    public function show($id)
    {
        return $this->billRepository->findById($id);
    }
}
