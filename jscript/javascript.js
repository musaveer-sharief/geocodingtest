(function ( $ ) {
    $.fn.mapify = function(url) {
        $(this).html( '<div class="control_container">' +
                        '<form onsubmit="return false;">' +
                        '<input type="text" placeholder="Type formatted address" id="search_box" />' +
                        '<input type="submit" value="Search" class="button" onclick="map.searchAddress()" />' +
                        '</form>' +
                    '</div>' +
                    '<div class="data_container">' +
                    '</div>' );

        this.searchAddress = function() {
            var search = $('#search_box').val();
            if (search.length > 0) {
                $('.data_container').html('Loading...');
                $.post(url, {'address': search, 'searchType': 'searchaddress'}, function(data) {
                    var htmlContent = '';
                    $.each(data, function(name, val) {
                    htmlContent += "<fieldset><legend>"+ name +":</legend>";
                        $.each(val, function(key, res) {
                            htmlContent += "<div>For Address "+ (key + 1) +" : <br/>Latitude : "+ res.lat +"  <br/>Longitude : "+ res.lon +"</div><hr />";
                        });
                        htmlContent += "</fieldset>";
                    });
                    $('.data_container').html(htmlContent);
                }, 'json');
            }
        }
        return this;
    }
 
}( jQuery ));
