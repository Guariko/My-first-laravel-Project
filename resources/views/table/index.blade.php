@extends("table.layout")

@section("model", "Home")

@section("content")

<section class="table__section">
    <div class="button__container button__container__large ">

        <a href="{{ route('table.create') }}" class="button">create term</a>
    </div>

    <table class="table">
        <thead>
            <tr>

                <th colspan="4" class="table__head">your terms</th>
            </tr>
        </thead>

        @if (count($data) > 0)
        <tbody>


            @foreach($data as $values)

            <tr>

                <td class="table__data"> <a href="{{ route('table.edit', [$values['id']]) }}">edit</a> </td>

                <td class="table__data">
                    <a href="{{ route('table.show', [$values->id]) }}" class="see">

                        {{$values["term"]}}
                    </a>
                </td>

                <td class="table__data">
                    <a href="{{ route('table.show', [$values->id]) }}" class="see">

                        {{$values["content"]}}
                    </a>
                </td>

                <td class="table__data">
                    <form class="delete__form" action=" {{route('table.destroy', $values->id)}} " method="POST">
                        @csrf
                        @method("DELETE")
                        <button class="delete" type="submit">delete</button>
                    </form>
                </td>

            </tr>

            @endforeach
        </tbody>
        @endif

    </table>



</section>



@endsection