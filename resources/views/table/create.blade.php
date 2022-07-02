@extends("table.layout")

@section("model", "Create Term")

@section("content")

<section class="create__term__section">

    <form action="{{ route('table.store') }}" method="POST" class="regular__form">

        @csrf

        <div class="input__container">
            <label for="term" class="label">term</label>
            <input type="text" maxlength="16" name="term" id="term" class="input" value="{{ old('term') }}">
            @error('term')

            <span class="error">{{$message}}</span>
            @enderror

        </div>

        <div class="input__container">
            <label for="content" class="label">content</label>
            <textarea name="content" id="content" cols="30" rows="10" maxlength="50" class="large__input input">
            {{ old('content') }}
            </textarea>

            @error('content')

            <span class="error">{{$message}}</span>
            @enderror
        </div>

        <div class="buttons__container">

            <div class="button__container">
                <button class="button">
                    done
                </button>
            </div>
            <div class="button__container">
                <a href="{{ route('table.index') }}" class="button">go home</a>
            </div>
        </div>


    </form>

</section>

@endsection