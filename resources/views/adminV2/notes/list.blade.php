@extends('admin.master')

@section('content')
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12 align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto">
                    <h4 class="mb-0">Notes</h4>
                </div>

                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Notes</li>
                    <li class="breadcrumb-item active">
                        <a href="{{ route('note.index') }}">List</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END: Breadcrumbs-->

    <!-- START: Card Data-->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                @include('admin.partials.alerts')
                <div class="card-body">
                    <div class="table-responsive">
                        <div>
                            <form method="GET" action="{{ route('note.index') }}" id="filterForm"
                                class="form-inline mb-3">
                                <label for="standard_id">Standard</label>
                                <select name="standard_id" id="standard_id" class="form-control mx-2"
                                    onchange="document.getElementById('filterForm').submit()">
                                    <option value="">All</option>
                                    @foreach ($standards as $stdard)
                                        <option value="{{ $stdard->id }}"
                                            {{ request('standard_id') == $stdard->id ? 'selected' : '' }}>
                                            {{ $stdard->name }}
                                        </option>
                                    @endforeach
                                </select>

                                <label for="book_id">Books</label>
                                <select name="book_id" id="book_id" class="form-control mx-2"
                                    onchange="document.getElementById('filterForm').submit()">
                                    <option value="">All</option>
                                    @foreach ($books as $book)
                                        <option value="{{ $book->id }}"
                                            {{ request('book_id') == $book->id ? 'selected' : '' }}>
                                            {{ $book->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>

                        </div>
                        <a href="{{ route('note.create') }}" class="btn btn-primary float-right"> <i class="fa fa-plus"></i>
                            Add Notes</a><br>
                        <table id="example" class="display table dataTable table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Standard</th>
                                    <th>Book</th>
                                    <th>Description</th>
                                    <th>File Url</th>
                                    <th>Tags</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notes as $n)
                                    <tr>
                                        <td>{{ $n->title }}</td>
                                        <td>{{ $n->book->standard->name }}</td>
                                        <td>{{ $n->book->title }}</td>

                                        <td>{{ $n->description }}</td>
                                        <td><a href="{{ asset($n->file_url) }}" target="_blank"
                                                rel="noopener noreferrer">{{ asset($n->file_url) }} </a></td>
                                        <td>{{ $n->tags }}</td>

                                        <td>
                                            <!-- Delete Form -->
                                            <form action="{{ route('note.destroy', $n->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm "
                                                    onclick="return confirm('Are you sure you want to delete this book?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                            <a href="{{ route('note.edit', $n->id) }}"> <i class="fa fa-pen"></i></a>

                                        </td>


                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Card DATA-->
@endsection
