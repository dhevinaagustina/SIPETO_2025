@extends('admin.layouts.app')

@section('title', 'Input Hasil TOEIC')
@section('page-title', 'Input Hasil Ujian')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Form Input Hasil TOEIC</h3>
    </div>
    <div class="card-body">
        <form>
            <div class="form-group">
                <label>NIM Peserta</label>
                <input type="text" class="form-control" placeholder="Masukkan NIM">
            </div>
            <div class="form-group">
                <label>Skor Listening</label>
                <input type="number" class="form-control" min="5" max="495">
            </div>
            <div class="form-group">
                <label>Skor Reading</label>
                <input type="number" class="form-control" min="5" max="495">
            </div>
            <div class="form-group">
                <label>Total Skor</label>
                <input type="number" class="form-control" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Hasil</button>
        </form>
    </div>
</div>
@endsection