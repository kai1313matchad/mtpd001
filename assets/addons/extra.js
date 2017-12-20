//Global Config
$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
	$($.fn.dataTable.tables(true)).DataTable()
    	.columns.adjust()
        .responsive.recalc();
 });

$('.dtp').datetimepicker({
    format: 'YYYY-MM-DD'
 });

$("input").change(function(){
	$(this).parent().parent().removeClass('has-error');
    $(this).next().empty();
 });
$("textarea").change(function(){
	$(this).parent().parent().removeClass('has-error');
    $(this).next().empty();
 });
$("select").change(function(){
	$(this).parent().parent().removeClass('has-error');
    $(this).next().empty();
 });
$('select').on('click',function(){                
    $(this).parent().parent().removeClass('has-error');
    $(this).next().empty();
});
$('input').on('click',function(){                
    $(this).parent().parent().removeClass('has-error');
    $(this).next().empty();
});
$('textarea').on('click',function(){                
    $(this).parent().parent().removeClass('has-error');
    $(this).next().empty();
});