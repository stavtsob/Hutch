var notification_count=0;
function addNotification($text)
    {
        var notif = document.getElementById("notif");
        var new_notif = notif.cloneNode(true);
        notification_count++;
        new_notif.setAttribute("id", "notif_"+notification_count);
        new_notif.childNodes[0].textContent= $text;
        document.getElementById("notifications").appendChild(new_notif);
        $('#notif_'+notification_count).show();
        var count = notification_count;
        setTimeout(function()
        {
            $('#notif_'+count).hide();
        }, 3000);
    }