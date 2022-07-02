@extends("table.layout")

@section("model", "Create Term")

@section("content")

<section class="create__term__section">



    <form action="{{ route('table.update', [$data->id]) }}" method="POST" class="regular__form">

        @csrf


        <div class="input__container">
            <label for="term" class="label">term</label>
            <input type="text" maxlength="16" name="term" id="term" class="input" readonly value="{{ $data->term }}">


        </div>

        <div class="input__container">
            <label for="content" class="label">content</label>
            <textarea name="content" id="content" cols="30" class="large__input input" readonly>
            {{$data->content}}
            </textarea>


        </div>

        <div class="buttons__container">


            <div class="button__container">
                <a href="{{ route('table.index') }}" class="button">go home</a>
            </div>
        </div>


    </form>



</section>

@endsection