<?php

namespace App\Http\Controllers;

use App\Helpers\StrHelper;
use App\Services\Contract\ContractServiceInterface;
use App\Services\Project\ProjectServiceInterface;
use App\Services\User\UserServiceInterface;
use Illuminate\Http\Request;

class ContractContrller extends Controller
{
    protected $contractService;
    protected $projectService;
    protected $userService;
    public function __construct(ContractServiceInterface $contractService,
                                ProjectServiceInterface $projectService,
    UserServiceInterface $userService
    )
    {
        $this->userService = $userService;
        $this->contractService = $contractService;
        $this->projectService = $projectService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $numberContract = "HĐ".StrHelper::counter('contract').date('mY');
        $projects = $this->projectService->projectNew();
        $users = $this->userService->list();

        return view('contract.create',compact('numberContract','projects','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
