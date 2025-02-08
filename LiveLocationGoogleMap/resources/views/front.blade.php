@extends('layouts.master')

@section('content')
    <div class="container text-center">
        <h2>
            Laramap
        </h2>
        <div id="map">
        </div>
        <br>

        <form action="/getLocationCoords" method="POST" id="searchGirls">
            @csrf
            <label for="district">District</label>
            <select id="locationSelect" name="location" style="width: 150px">
                <option value="{{ }}"></option>
            </select>
            <div id="city"></div>
        </form>


        <br>
        <h4>
            Name of Girls
        </h4>
        <hr>
        <ul id="girlsResult">
        </ul>
        </hr>
        </br>
        </br>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#locationSelect').select2({
                placeholder: "Select and Search",
                ajax: {
                    url: "/api/searchCity",
                    type: "POST",
                    dataType: "json",
                    delay: 250,
                    data: function(params) {
                        return {
                            locationVal: params.term,
                        };
                    },

                    processResults: function(data) {
                        return {
                            results: $.map(data.items, function(val, i) {
                                return {
                                    id: i,
                                    text: val
                                };
                            })
                        };
                    }
                }
            });

            $('#locationSelect').on('select2:select', function(e) {
                var val = $('#locationSelect').val();
                $.post('http://127.0.0.1:8000/api/getLocationCoords', {
                    val: val
                }, function(match) {

                    var myLatLng = new google.maps.LatLng(match[0], match[1]);
                    createMap(myLatLng);
                    searchGirls(match[0], match[1]);
                });
            });
        });
    </script>
@endsection
