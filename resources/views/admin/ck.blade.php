try {
    $input = $request->all();
    Ckeditor::updateOrCreate([
        'id' => $request->id,
    ],[
        'title' => $input->['title'],
        'body' => $input->['body'],    
    ]);
    if ($request->id){
        $msg = 'update successfully';
    }else {
        $msg = 'added successfully';
    }
    $arr = array("status"=>200,"msg"=>$msg);
} catch (\Illuminate\Database\QueryException $ex){
    $msg = $ex->getMessage();
    if(isset($ex->errorInfo[2])) : 
        $msg = $ex->errorInfo[2];
    endif;
    $arr = array("status"=>400,"msg"=>$msg,"result"=> array());
}
return \Response::json($arr);


CKEDITOR.replace('editor', {
    filebrowserUploadUrl: '{{ route('editor',['_token'=>csrf_token]()) }}',
    filebrowserUploadMethod: 'form'
});



if($request-hasFile('upload')){
    $originName = $request->file('upload')->getClientOriginalName();
    $fileName = pathinfo($originName, PATHINFO_FILENAME);
    $extension = $request->file('upload')->getClientOriginalExtension();
    $fileName = $fileName.'_'.time().'.'.$extension;
    $request->file('upload')->move(public_path('image'),$fileName);
    $CKEditorFunNum = $request->input('CKEditorFunNum');
    $url = asset('public/image/'.$fileName);
    $msg = "Image uploaded successfully";
    $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFunNum,'$url','$msg')</script>";
    @header('Content-Type: text/html; charset=UTF-8');
    echo $response;
}