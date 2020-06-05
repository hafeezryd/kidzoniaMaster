@extends('layouts.header')
@section('user')
<h2>Parents </h2>
@endsection
@section('content')
<div class="row">
    <div class="col-6">

        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h3> Month Theme <h3>
                </div>

                <div class="card-body">
                    <p>India is my Country, now I will know all the States of it: Introduction of <strong>Theme - My
                            Country</strong></p>
                    <p>Peacock, Tiger and Mango- this month I will learn the National Symbol of my Country.
                        My Teacher will teach me new way of writing starting with Cursive Writing Aa to Cc. I know the
                        numbers from 1 to 100, now I fill any sequence- Learning missing</p>

                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <video controls width="450" controls controlsList="nodownload">
            <source src="{{asset('storage/classwork/video.mp4')}}" type="video/mp4">
            Sorry, your browser doesn't support embedded videos.
        </video>
    </div>
</div>

<div class="row">
    <div class="card col">
        <div class="card-header">
            <ul style="text-align: center"><strong>Will start the day with a Positive thought and a Prayer.</strong>
            </ul>
        </div>
        <div class="card-body">

            <li>Thought of the Day:</li>
            <li> I AM BLESSED</li>
            <li>I am going to tell my Parents </li>
            <li>3 things I appreciate about “MY FAMILY”</li>

        </div>
    </div>


    <div class="card col">
        <div class="card-header">
            <ul style="text-align: center"><strong>Activity for the Day</strong></ul>
        </div>
        <div class="card-body">
            <li> Parents can assist Kidzos for drawing INDIA Map and can ask the
                Kidzos to colour in TRICOLOUR.</li>
            <li><span>Kindly refer this link: </span><a href="https://www.youtube.com/watch?v=HKwc7AMhre8">Click </a>
            <li>


        </div>
    </div>

    <div class="card col">
        <div class="card-header">
            <ul><strong>Worksheet</strong></ul>
        </div>
        <div class="card-body">

            <li> 1) Write the lowercase alphabet from a to z.</li>
            <li> 2) Write 5 objects that you can find in your bedroom.</li>
            <li>3) Write numbers from 1 to 30.</li>
        </div>
    </div>

</div>
<p><strong>NOTE: </strong> Kindly share Videos/Photos of your ward while doing the activities. </p>

@endsection