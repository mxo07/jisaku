$(function (){
   
    var bookmark = $('.js-bookmark-toggle');
    var bookmarkReportId;

    bookmark.on('click',function(){
    
        var $this = $(this);

        bookmarkReportId = $this.data('reportsid');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            
            url: '/report_bookmark/report', //routeの記述
            type: 'POST', //受け取り方法の記述（GETもある）
            data: {
                'reports_id' : bookmarkReportId
            }
            
            
    })

        // Ajaxリクエストが成功した場合
        .done(function (data) {
//lovedクラスを追加
            $this.toggleClass('open'); 

//.likesCountの次の要素のhtmlを「data.postLikesCount」の値に書き換える
            $this.next('.bookmarksCount').html(data.bookmarksCount); 

        })
        // Ajaxリクエストが失敗した場合
        .fail(function (data, xhr, err) {
//ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
//とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑
            console.log('エラー');
        });
    
    return false;
    });
});