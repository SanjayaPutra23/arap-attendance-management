var toolbarOptions=[['bold','italic','underline','strike'],['blockquote','code-block'],[{'header':1},{'header':2}],[{'list':'ordered'},{'list':'bullet'}],[{'script':'sub'},{'script':'super'}],[{'indent':'-1'},{'indent':'+1'}],[{'direction':'rtl'}],[{'size':['small',false,'large','huge']}],[{'header':[1,2,3,4,5,6,false]}],[{'color':[]},{'background':[]}],[{'font':[]}],[{'align':[]}],['clean']];
var editor1=new Quill('#editor',{modules:{toolbar:toolbarOptions},theme:'snow'});
editor1.on('text-change', function(delta, oldDelta, source) {
    document.getElementById("quill_data").value = editor1.root.innerHTML;
});

var editor2=new Quill('#editor2',{modules:{toolbar:toolbarOptions},theme:'snow'});
editor2.on('text-change', function(delta, oldDelta, source) {
    document.getElementById("quill2_data").value = editor2.root.innerHTML;
});
