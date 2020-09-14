
    async function creating(){
    var path,filename;
    const {value:data} =await Swal.fire({
    title: `Creating Product`,

        html:
    '<input id="swal-input1" class="swal2-input" type="text" placeholder="Product Name" required>' +
    '<input id="swal-input2" class="swal2-input" type="text" placeholder="Product Price" required>' +
     '<input id="swal-input5" class="swal2-input" type="text" placeholder="Product Quantity" required>' +
            '<input id="swal-input3" class="swal2-file" type="file"  required>'+
     '<select id="swal-input4" class="swal2-select"><option value="0">Select Category</option><option value="1">Shirts</option><option value="2">Outerwear(eg.Longcoat,Jacket)</option><option value="3">Pants</option><option value="4">FootWears</option> '   ,
    focusConfirm: false,
    preConfirm: () => {
    return [
    document.getElementById('swal-input1').value,
    document.getElementById('swal-input2').value,
    document.getElementById('swal-input3').value,
    document.getElementById('swal-input4').value,
    document.getElementById('swal-input5').value,

    ]

} ,
    showCancelButton: true,
});
    if(data){
        console.log(JSON.stringify(data));
    }
    if(data[0]==''){
    Swal.fire({
    icon: 'warning',
    text: 'Product Name is required.'
});
}
    else if(data[1]==''){
    Swal.fire({
    icon: 'warning',
    text: 'Product Price is required.'
});
}
    else if(data[2] == '')
{
    Swal.fire({
    icon: 'warning',
    text: 'Product Image is required.'
});
}
    else if(data[3]=='0'){
        Swal.fire({
            icon:'warning',
            text:'Please select category'
        });
    }
    else if(data[4]==null || data[4]==''){
        data[4]='1';
    }
    else{

    var inputfile=document.getElementById("swal-input3");
    let file=inputfile.files[0];
    var t = file.type.split('/').pop().toLowerCase();
    console.log(t);
        if(t!= 'jpg' && t!='png' && t!='jpeg'){
        Swal.fire({
        icon:"error",
        text:"Only Image is allowed",
        })
                }
            else{
        let reader=new FileReader();
        reader.onload = ()=>{
        var info = {
        'name':data[0],
        'price':data[1],
        'image' : reader.result,
        'extension' : t,
          'select':data[3],
            'quantity':data[4],
        }
          // console.log(text);
    window.livewire.emit('CreatingNewPost',info);
}
    reader.readAsDataURL(file);
}
}
}
    window.livewire.on('createpost',function(){
    creating();
});


    window.livewire.on('alerting',$message=>{
    console.log($message);

})
    async function f(i){
    const  { value:ipAddress}=await Swal.fire({
    title: `Editing Product Id ${i}`,
    html:
    '<input id="swal-input1" class="swal2-input" type="text" placeholder="Product Name">' +
    '<input id="swal-input2" class="swal2-input" type="text" placeholder="Product Price">',
    focusConfirm: false,
    preConfirm: () => {
    return [
    document.getElementById('swal-input1').value,
    document.getElementById('swal-input2').value
    ]
} ,
    showCancelButton: true,
    inputValidator: (value) => {
    if (!value) {
    return 'You need to write something!'
}
}

})
    if(ipAddress[0]==''&&ipAddress[1]==''){
    Swal.fire({
    icon: 'warning',
    text:"You must write something!!"});
}
    else{

    const res=await axios.post(`testing/${i}`,ipAddress);
    // Swal.fire(JSON.stringify(ipAddress));
    const data=res.data;
    if (data) {
    Swal.fire({
    icon:"success",
    text:data});
}
    window.livewire.emit('refreshing');
}

}

    window.livewire.on('editform', postId =>  {
    // document.getElementById('editformid').style.display='flex';
    f(postId);
});
