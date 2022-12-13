@extends('layouts.main')
@section('container')
    @include('sweetalert::alert')
    <div class="wow fadeInLeft">
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('home') }}">
                            <em class="">
                                <img src="{{ asset('style/gambar/home.gif') }}" width="20px" height="auto" alt=""
                                    srcset="">
                            </em>
                        </a>
                    </li>
                    <li class="active">Data Kostumer</li>
                </ol>
            </div>
            <!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Data Kostumer</h2>
                </div>
            </div>
        </div>
        <!--/.main-->
    </div>
    <div class="wow fadeInRight">
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <form class="form-inline">
                                <div class="form-group">
                                </div>
                                <div class="form-group">
                                    <a type="button" class="btn btn-danger" href="{{ route('costumer.create') }}"><i
                                            class="fa fa-plus"></i> Tambah Costumer</a>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead class="text-center" style="vertical-align:middle;">
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">Nama</th>
                                        <th rowspan="2">Alamat</th>
                                        <th rowspan="2">No.Hp</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                    <tr>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center" style="vertical-align:middle;">
                                    @forelse ($costumers as $c)
                                        <tr>
                                            <td>{{ $c->id }}</td>
                                            <td>{{ $c->name }}</td>
                                            <td>{{ $c->address }}</td>
                                            <td>{{ $c->phone }}</td>
                                            <td>
                                                <a href="{{ route('costumer.edit', $c->id) }}" class="btn btn-warning"><i
                                                        class="fa fa-edit"> Edit</i></a>
                                            </td>
                                            <td>
                                                <form action="{{ route('costumer.destroy', $c->id) }}" method="post"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Apakah anda yakin?')">
                                                        <i class="fa fa-trash"> Delete</i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {!! $costumers->withQueryString()->links() !!}
                    </div>
                </div>
                <div class="col-sm-12">
                    <p class="back-link">ERP Produksi Kaos Polos 2022</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
