$(function(){
          var shortcuts = {
        'TAB': 'indent',
        'SHIFT+TAB': 'outdent'
      };
      
    $('.js-summernote').summernote({
        tabsize: 2,
        height: 300,

        keyMap: {
            pc: shortcuts,
            mac: shortcuts,
          },
        callbacks: {
            onImageUpload : function(files, editor, welEditable) {

                for(var i = files.length - 1; i >= 0; i--) {
                     sendFile(files[i], this);
                }
            },
            onMediaDelete : function(files, editor, welEditable) {
            
                
                //console.log(files[0].src);
                removeImageFile(files[0].src, this);
            }
        } 



    });
    
        function sendFile(file, el) {
            var form_data = new FormData();
            form_data.append('file', file);

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: form_data,
                type: "POST",
                contentType: 'multipart/form-data',
                // 画像保存用のルート設定
                url: '/admin/summernote/temp',
                cache: false,
                contentType: false,
                processData: false,
                success: function(url) {
                    $(el).summernote('editor.insertImage', url);
                },
                error: function() {
                    alert('画像がアップロードできませんでした');
                }
            });
        } 
        
        function removeImageFile(filepass, el) {
            //alert(111);
           
            var form_data = new FormData();
            form_data.append('filepass', filepass);   
            
            //console.log(form_data.get('filepass'));
            
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: form_data,
                type: "POST",
                contentType: 'multipart/form-data',
                // 画像保存用のルート設定
                url: '/admin/summernote/remove',
                cache: false,
                contentType: false,
                processData: false,
                success: function() {
                    //console.log('画像削除成功');
                    //console.log(url + ':成功:url');
                
                    alert('画像を削除しました');
                }
                /*error: function(url) {
                    alert('画像を削除できませんでした');
                    console.log(url + 'NG:url');
                }*/
            }); 
            
        }
    
});