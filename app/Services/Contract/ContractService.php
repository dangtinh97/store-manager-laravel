<?php

namespace App\Services\Contract;

use App\Http\Responses\ApiResponse;
use App\Http\Responses\ResponseError;
use App\Http\Responses\ResponseSuccess;
use App\Models\Contract;
use App\Models\Project;
use App\Repositories\Contract\ContractRepositoryInterface;
use App\Repositories\Project\ProjectRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContractService implements ContractServiceInterface
{

    protected $contractRepository;
    protected $projectRepository;

    public function __construct(ContractRepositoryInterface $contractRepository, ProjectRepositoryInterface $projectRepository)
    {
        $this->contractRepository = $contractRepository;
        $this->projectRepository = $projectRepository;
    }

    public function create(array $params): ApiResponse
    {
        try{
            DB::beginTransaction();
            $create = [
                'user_id' => (int)$params['user_id'],
                'project_id' => (int)$params['project_id'],
                'name_contract' => $params['name_contract'],
                'number_contract' => $params['number_contract'],
                'effective_date' => new Carbon($params['effective_date']),
                'expiration_date' => new Carbon($params['expiration_date']),
                'admin_id' => Auth::id(),
                'status' => Contract::STATUS_NEW,
                'quantity' => (int)$params['quantity']
            ];

            $project = $this->projectRepository->findById($create['project_id']);
            if ($project->status !== Project::STATUS_ACTIVE) return new ResponseError("Vui lòng chọn dự án đang hoạt động");
            if ($project->quantity - $project->order <$create['quantity']) return new ResponseError("Số lượng phải nhỏ hơn ".($project->quantity - $project->order));
            $project->increment('order',$create['quantity']);
            $create['price'] = $project->price;
            $this->contractRepository->create($create);
            DB::commit();
            return new ResponseSuccess();
        }catch (\Exception $exception){
            DB::rollBack();
            return new ResponseError($exception->getMessage());
        }


    }

    public function index()
    {
       return $this->contractRepository->getAll();
    }

    public function show($id)
    {
        return $this->contractRepository->findById($id);
    }
}
