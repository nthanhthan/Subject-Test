$(document).ready(function() {
    $('#dataTables-example').DataTable({
            responsive: true
    });

    $('#add-answer').on('click', function () {
       var sum = $('.form-answer').length;
       if ((Number(sum) + 1) > 4) {
           alert('Bạn chỉ được thêm 4 đáp án');
       } else {
           var count = $('.form-answer:last-child').attr('data-count');
           var html = '';
           html += '<div class="row form-answer" data-count="'+(Number(count) + 1)+'">\n' +
               '   <div class="col-sm-8">\n' +
               '   <textarea class="form-control"\n' +
               '   rows="2"\n' +
               '   placeholder="Nhập đáp án"\n' +
               '   name="answer['+(Number(count) + 1)+'][]"\n' +
               '   required\n' +
               '   maxlength="255"></textarea>\n' +
               '   </div>\n' +
               '   <div class="col-sm-2 text-center">\n' +
               '   <input class="form-check-input" type="checkbox" name="is_correct['+(Number(count) + 1)+'][]" style="cursor: pointer">\n' +
               '   </div>\n' +
               '   <div class="col-sm-2 text-center answer-remove" data-count="'+(Number(count) + 1)+'">\n' +
               '   <i class="fa fa-trash-o" style="font-size:23px;cursor:pointer;color:red"></i>\n' +
               '   </div>\n' +
               '   </div>';
           $('#form-summary').append(html);
       }
    });

    $('body').on('click', '.answer-remove', function () {
       var item = $(this).attr('data-count');
        var sum = $('.form-answer').length;
        if (sum > 1) {
            $('.form-answer[data-count="'+item+'"]').remove();
        }
    });

    $('#is_multiple').on('change', function () {
       var value = $(this).val();
       if (value) {
           $('#form-sum').show();
       } else {
           $('#form-sum').hide();
        }
    });

    var data = $('input[name="question_ids"]').val();
    $('body').on('change', '.question-exam', function () {
         var value = $(this).val() + ',';
         var checked = $(this).attr('data-checked');

         if (checked == 0) {
             data += value;
             $(this).attr('data-checked', 1);
         } else {
             $(this).attr('data-checked', 0);
             data = data.replace(value, '');
         }
        $('input[name="question_ids"]').val(data);
    });

    // Mapping student-subject
    var data = $('input[name="student_ids"]').val();
    $('.student_exam').on('change',function () {
        var value = $(this).val() + ',';
        var checked = $(this).attr('data-checked');

        if (checked == 0) {
            data += value;
            $(this).attr('data-checked', 1);
        } else {
            $(this).attr('data-checked', 0);
            data = data.replace(value, '');
        }
        $('input[name="student_ids"]').val(data);
    });

    $('#video').on('change', function () {
        var file = document.getElementById('video').files[0];
        var check = checkImage(file);
        if (!check) {
            document.getElementById('video').value = '';
        }
        return true;
    });

    function checkImage(file) {
        var maxSize = $('#maxsize').val();
        //Tested in Firefox and Google Chorme
        var sizee = file.size; //file size in bytes
        sizee = sizee / 1024; //file size in Kb
        sizee = sizee / 1024; //file size in Mb

        if (sizee > maxSize) {
                alert('Bạn chỉ có thể upload file với dung lượng tối đa là: '+maxSize +'MB');
                return false;
            }
        return true;
    }
});