<?php

namespace App\Http\Controllers;

use App\Helpers\StrHelper;
use App\Http\Requests\ContractStoreRequest;
use App\Services\Contract\ContractServiceInterface;
use App\Services\Project\ProjectServiceInterface;
use App\Services\User\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
       $contracts =  $this->contractService->index();

       return view('contract.list',compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $numberContract = "HĐ".StrHelper::counter('contract').date('mY');
        $projects = $this->projectService->projectActive();
        $users = $this->userService->list();
        return view('contract.create',compact('numberContract','projects','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ContractStoreRequest $request)
    {
       $create = $this->contractService->create($request->all());
       return response()->json($create->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \never
     */
    public function show($id)
    {
        $contract = $this->contractService->show($id);
        if(is_null($contract)) return abort(404);
        return view('contract.show',compact('contract'));
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

    public function download($id)
    {
        $defaultFormat = [
            'name'=>'Arial'
        ];
        $contract = $this->contractService->show($id);
        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        $phpWord->setDefaultFontSize('13');
        $phpWord->setDefaultParagraphStyle(
            array(
                'align'      => 'both',
                'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(12),
                'spacing'    => 100,
            )
        );

        $section = $phpWord->addSection();
        $section->addText("CỘNG HOÀ XÃ HỘI CHỦ NGHĨA VIỆT NAM",array_merge($defaultFormat,[
            'bold' => true,
            'size' => 18
        ]),[
            'align' => 'center'
        ]);
        $section->addText("Độc lập - Tự do - Hạnh phúc",array_merge($defaultFormat,[
            'bold' => true,
            'size' => 16
        ]),[
            'align' => 'center'
        ]);


        $section->addText('**********',null,[
            'align' => 'center'
        ]);

        $section->addText('HỢP ĐỒNG MUA BÁN HÀNG HOÁ',[
            'bold' => true,
            'size' => 18
        ],[
            'align' => 'center'
        ]);
        $section->addText('Hợp đồng số: '.$contract->number_contract,[
        ],[
            'align' => 'center'
        ]);

        $section->addText('- Căn cứ vào Bộ luật Dânn sự năm 2005;');
        $section->addText('- Luật thương mại năm 2005 và các văn bản hướng dẫn thi hành;');
        $section->addText('- Căn cứ đơn chào hàng (đặt hàng hoặc được sự thực hiện thoả thuận của 2 bên);');
        $section->addText('Hôm nay ngày......tháng.....năm.....',[
            'italic'=>true
        ]);
        $section->addText('Tại địa điểm...............');
        $section->addText('Chúng tôi gồm:',['bold' => true]);
        $section->addText('Bên A',['bold' => true]);
        $section->addText('Tên doanh nghiệp: Monstarlab');
        $section->addText('Địa chỉ trụ sở chính: ');
        $section->addText('Số điện thoại: ');
        $section->addText('Đại diện là: '.$contract->admin->full_name);
        $section->addText('Chức vụ:');
        $section->addText('Bên B',['bold' => true]);
        $section->addText('Tên doanh nghiệp: '.$contract->user->full_name);
        $section->addText('Địa chỉ trụ sở chính: '.$contract->user->address);
        $section->addText('Số điện thoại: '.$contract->user->mobile);
        $section->addText('Email: '.$contract->user->email);
        $section->addText('Chức vụ: ');

        $section->addText('Hai bên thống nhất thoả thuận nội dung như sau:',['bold' => true]);
        $section->addText('Điều 1: Nội dung giao dịch');

        $section->addText('Tên hàng: '.$contract->project->name_project);
        $section->addText('Số lượng: '.$contract->quantity);
        $section->addText('Đơn giá: '.number_format($contract->price));
        $section->addText('Thành tiền: '.number_format($contract->price* $contract->quantity)." vnđ");
        $section->addText('Ngày lập: '.date('d/m/Y',strtotime((int)$contract->created_at->__toString()/1000)));
        $section->addText('Ngày hiệu lực: '.date('d/m/Y',strtotime($contract->effective_date)));
        $section->addText('Ngày hết hạn: '.date('d/m/Y',strtotime($contract->expiration_date)));
        $section->addText('Trạng thái hợp đồng: '.$contract->statusText());
        $section->addText('');
        $section->addText("Đại diện bên A \t\t\t\t\t\t\tĐại diện bên B", array(), "leftRight");


        $filename = Str::slug($contract->name_contract).".docx";
        header( "Content-Type: application/vnd.openxmlformats-officedocument.wordprocessing‌​ml.document" );// you should look for the real header that you need if it's not Word 2007!!!
        header( 'Content-Disposition: attachment; filename='.$filename );
        $temp_file = tempnam(sys_get_temp_dir(), 'PHPWord');
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save( "php://output" );// this would output it like echo, but in combination with header: it will be sent
    }
}
