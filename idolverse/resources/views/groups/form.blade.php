@extends('layouts.app')

@section('content')
<h1>{{ $group->id ? 'Edit Group' : 'Create Group' }}</h1>

<form action="{{ $group->id ? route('groups.update', $group->id) : route('groups.store') }}" method="POST">
    @csrf
    <label>Nama Group:</label>
    <input type="text" name="name" value="{{ old('name', $group->name) }}" required>

    <label>Agensi:</label>
    <input type="text" name="agencyId" value="{{ old('agencyId', $group->agencyId) }}" required>

    <label>Jenis:</label>
    <select name="type">
        <option value="girlgroup" {{ $group->type == 'girlgroup' ? 'selected' : '' }}>Girl Group</option>
        <option value="boygroup" {{ $group->type == 'boygroup' ? 'selected' : '' }}>Boy Group</option>
        <option value="coedgroup" {{ $group->type == 'coedgroup' ? 'selected' : '' }}>Co-ed Group</option>
        <option value="solist" {{ $group->type == 'solist' ? 'selected' : '' }}>Soloist</option>
        <option value="band" {{ $group->type == 'band' ? 'selected' : '' }}>Band</option>
    </select>

    <label>Deskripsi:</label>
    <textarea name="description">{{ old('description', $group->description) }}</textarea>

    <label>Foto:</label>
    <input type="text" name="photo" value="{{ old('photo', $group->photo) }}">

    <label>Jumlah Member:</label>
    <input type="number" name="members" value="{{ old('members', $group->members) }}">

    <label>Instagram:</label>
    <input type="text" name="instagram" value="{{ old('instagram', $group->instagram) }}">

    <label>Website:</label>
    <input type="text" name="website" value="{{ old('website', $group->website) }}">

    <button type="submit">{{ $group->id ? 'Update' : 'Create' }}</button>
</form>
@endsection
