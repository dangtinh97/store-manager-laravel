<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeliveryNoteStoreRequest;
use App\Models\Bill;
use App\Models\Project;
use App\Services\DeliveryNote\DeliveryNoteServiceInterface;
use App\Services\Project\ProjectServiceInterface;
use Illuminate\Http\Request;

class DeliveryNoteController extends Controller
{
    protected $projectService;
    protected $deliveryNoteService;
    public function __construct(ProjectServiceInterface $projectService,DeliveryNoteServiceInterface $deliveryNoteService)
    {
        $this->projectService = $projectService;
        $this->deliveryNoteService = $deliveryNoteService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $list = $this->deliveryNoteService->list();
        return view('delivery-note.list',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $projects = $this->projectService->projectByStatus(Project::STATUS_ACTIVE);
        return view('delivery-note.create',compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(DeliveryNoteStoreRequest $request)
    {
        $create = $this->deliveryNoteService->store($request->all());
        return response()->json($create->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\never
     */
    public function show($id)
    {
        $item = $this->deliveryNoteService->show($id);
        $user = $item->project->contract()->user;
        if(is_null($item)) return abort(404);
        return view("delivery-note.show",compact('item','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function printBill($id)
    {
        $item = $this->deliveryNoteService->show($id);
        $user = $item->project->contract()->user;
        if(is_null($item)) return abort(404);
        $item->update([
           'status' => Bill::STATUS_EXPORT
        ]);
        return view("delivery-note.print",compact('item','user'));
    }
}
