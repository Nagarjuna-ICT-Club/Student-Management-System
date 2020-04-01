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
        var updated =
        {
                "_id":"5e81ff30028b590d24d60428",
                "created_at":{"$date":{"$numberLong":"1585449502323"}},
                "full_name":"Garima",
                "email":"garima@nagarjunacollege.edu.np",
                "password":"password",
                "program_id":"123445ab",
                "__v":{"$numberInt":"0"},
                "semester_id":"1111111",
                "contact_number":"9808383500"
        }
        var profile = axios.post('http://sudeepmishra.com.np/api/new_student/',updated);
        console.log(profile);
    </script>
@endsection
