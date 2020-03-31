@extends('layouts.app')
@section('content')
    <button class="g-button btn btn-sm">Add New Students</button>
@endsection
@section('js')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        // var students = [{
        //         "_id":{"$oid":"5e800a2354d5822554c30e81"},
        //         "created_at":{"$date":{"$numberLong":"1585449502323"}},
        //         "full_name":"Rekha Bhandari",
        //         "email":"rekhabhandari74@nagarjunacollege.edu.np",
        //         "password":"password",
        //         "program":"BSc.CSIT",
        //         "__v":{"$numberInt":"0"},
        //         "semester":"1"
        // },
        // {
        //         "_id":{"$oid":"5e800a2354d5822554c30e82"},
        //         "created_at":{"$date":{"$numberLong":"1585449502323"}},
        //         "full_name":"sudeep",
        //         "email":"sudeep@nagarjunacollege.edu.np",
        //         "password":"password",
        //         "program":"BSc.CSIT",
        //         "__v":{"$numberInt":"0"},
        //         "semester":"1"
        // },
        // {
        //         "_id":{"$oid":"5e800a2354d5822554c30e83"},
        //         "created_at":{"$date":{"$numberLong":"1585449502323"}},
        //         "full_name":"garima",
        //         "email":"garima@nagarjunacollege.edu.np",
        //         "password":"password",
        //         "program":"BSc.CSIT",
        //         "__v":{"$numberInt":"0"},
        //         "semester":"1"
        // }]
        var profile = axios.get('http://sudeepmishra.com.np/api/profile/5e800a2354d5822554c30e83');
        console.log(profile);
    </script>
@endsection
