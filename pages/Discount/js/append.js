//Insert Data
    let event_name = document.getElementById("evtName").value;
    let event_category = document.getElementById("evtCtg").value;
    let event_start = document.getElementById("evtStart").value;
    let event_end = document.getElementById("evtEnd").value;
    let event_content = document.getElementById("evtCnt").value;
    let discount = document.getElementById("evtDiscount").value;
    let percent_off = document.getElementById("evtPcentoff").value;
    let event_remark = document.getElementById("evtRemark").value;

    // let upd_name = document.getElementById("event_name").value;
    // let upd_category = document.getElementById("event_category").value;
    // let upd-start = document.getElementById("event_start").value;
    // let upd_end = document.getElementById("event_end").value;
    // let upd_cnt = document.getElementById("event_content").value;
    // let upd_dis = document.getElementById("discount").value;
    // let upd_poff = document.getElementById("percent_off").value;
    // let upd_remark = document.getElementById("event_remark").value;
    // let upd_id = document.getElementById("user_id").value;

function doInsert(){

    $.ajax({
      method:"POST",
      url:"insert_data.php",
      dataType:"json",
      data:{
        event_name:event_name,
        event_category:event_category,
        event_start:event_start,
        event_end:event_end,
        event_content:event_content,
        discount:discount,
        percent_off:percent_off,
        event_remark:event_remark
      },
      caches:false
      .done(function(response){
        //console.log(response)
        if(response.status==0){
          alert(response.message)="Data have inserted.";
        }else{
            alert(response.message)="Data sented failed.";
        }
      }).fail(function(jqXHR, textStatus){
        console.log("Request failed:" + textStatus);
      })
  })
}



$(document).ready(function(){
      //Load data on modal
     $(document).on('click','.upd_btn',function(){
       var x = this.id.replace(/[^0-9]/g, '');
       //alert(x);
       $.ajax({
            method:"POST",
            url:"fetch_data.php",
            data:{id:x},
            dataType:"json",
            success:function(data){
                $('#event_name').val(data.event_name);
                $('#event_category').val(data.event_category);
                $('#event_start').val(data.event_start);
                $('#event_end').val(data.event_end);
                $('#event_content').val(data.event_content);
                $('#discount').val(data.discount);
                $('#percent_off').val(data.percent_off);
                $('#event_remark').val(data.event_remark);
                $('#user_id').val(data.id);
                $('#Update_data').modal('show');
            }
          });

      });
      $(document).on('click','#Delete_Btn',function(){
          var x = document.getElementById("user_id").value;
          // var upd_name = document.getElementById("event_name").value;
          // var upd_category = document.getElementById("event_category").value;
          // var upd_start = document.getElementById("event_start").value;
          // var upd_end = document.getElementById("event_end").value;
          // var upd_cnt = document.getElementById("event_content").value;
          // var upd_dis = document.getElementById("discount").value;
          // var upd_poff = document.getElementById("percent_off").value;
          // var upd_remark = document.getElementById("event_remark").value;
          //alert(x);
          $.ajax({
            method:"POST",
            url:"delete_data.php",
            data:{id:x},
            dataType:"json",
            success:function(data){
              //$('#insert_form')[0].reset();
              //$('#Update_data').modal('hide');
              $('#event_table').html(data);
            }
          })
      })
      //Updata new data
      $(document).on('click','#Update_Btn',function(){
        var x = document.getElementById("user_id").value;
        var upd_name = document.getElementById("event_name").value;
        var upd_category = document.getElementById("event_category").value;
        var upd_start = document.getElementById("event_start").value;
        var upd_end = document.getElementById("event_end").value;
        var upd_cnt = document.getElementById("event_content").value;
        var upd_dis = document.getElementById("discount").value;
        var upd_poff = document.getElementById("percent_off").value;
        var upd_remark = document.getElementById("event_remark").value;
        
        $.ajax({
          method:"POST",
          url:"edit_data.php",
          dataType:"json",
          data:{
            id:x,
            event_name:upd_name,
            event_category:upd_category,
            event_start:upd_start,
            event_end:upd_end,
            event_content:upd_cnt,
            discount:upd_dis,
            percent_off:upd_poff,
            event_remark:upd_remark  
          },
          success:function(data){
            $('#insert_form')[0].reset();
            $('#Update_data').modal('hide');
            $('#event_table').html(data);
          }
        });
      });
      $(document).on('click','.view_btn',function(){
            var x = this.id.replace(/[^0-9]/g, '');
            //alert(x);
            $.ajax({
                method:"POST",
                url:"fetch_data.php",
                data:{id:x},
                dataType:"json",
                success:function(data){
                    $('#PMO_name').val(data.event_name);
                    $('#PMO_category').val(data.event_category);
                    $('#PMO_start').val(data.event_start);
                    $('#PMO_end').val(data.event_end);
                    $('#PMO_content').val(data.event_content);
                    $('#PMOdiscount').val(data.discount);
                    $('#PMOpercent_off').val(data.percent_off);
                    $('#PMO_remark').val(data.event_remark);
                    $('#View_data').modal('show');
                }
              });

          });

})
     // $('#insert_form').on("submit", "Update_Btn",function(event){
     //  event.preventDefault();
     //  if($('#event_name').val() == "")
     //  {
     //       alert("event_name is required");
     //  }
      // else if($('#event_category').val() == '')
      // {
      //      alert("event_category is required");
      // }
      // else if($('#event_start').val() == '')
      // {
      //      alert("event_start is required");
      // }
      // else if($('#event_end').val() == '')
      // {
      //      alert("event_end is required");
      // }
      // else if($('#event_content').val() == '')
      // {
      //      alert("event_content is required");
      // }
      // else if($('#discount').val() == '')
      // {
      //      alert("discount is required");
      // }
      // else if($('#percent_off').val() == '')
      // {
      //      alert("percent_off is required");
      // }
      // else if($('#event_remark').val() == '')
      // {
      //      alert("event_remark is required");
      // }
      //else
      //{
           // $.ajax({
           //      url:"edit_data.php",
           //      method:"POST",
           //      data:$('#insert_form').serialize(),
           //      dataType:"json",
           //      beforeSend:function(){
           //           $('#insert').val("Inserting");
           //      },
           //      success:function(data){
           //           $('#insert_form')[0].reset();
           //           $('#Update_data').modal('hide');
           //           $('#event_table').html(data);
           //      }
           // });
      //}
//   });
//
//
// })
