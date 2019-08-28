var base_url = document.getElementById('ajax_barcode').getAttribute('data-base_url');
var item_id = document.getElementById('ajax_barcode').getAttribute('data-item_id');

$('#add_barcode_btn').click(function()
{
    var barcode = $('#new_barcode').val();
    $.ajax(
        {
            url: base_url + 'index.php/ajax_add_barcode',
            type: 'POST',
            data: {item_id: item_id, barcode: barcode},
            error: function()
            {
                alert('Something went wrong.');
            },
            success: function(data)
            {
                if(data == '200')
                {
                    addNotification('Barcode ' + barcode + ' added to item.');
                }
                else if(data == '400')
                {
                    alert('This barcode is already registered.');
                }
                else
                {
                    alert('Server error. Please check your connection.');
                }
            }
        }
    )
});