@extends('admin.layout.app')

@section('content')


    <h1>Modification du local "{{ $local->label }}"</h1>

    <form  method="POST" action="{{ route('admin_local_update', ['local' => $local]) }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="row">
            <div class="col-9 pr-5">
                <div class="form-group">
                    <label for="label">Libellé</label>
                    <input type="text" class="form-control" name="label" value="{{ $local->label }}">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" rows="4">{{ $local->description }}</textarea>
                </div>

                <div class="form-row">
                    <div class="form-group col-12 col-lg-6">
                        <label for="address">Adresse</label>
                        <input type="text" class="form-control" name="address" value="{{ $local->address }}">
                    </div>
                    <div class="form-group col-12 col-lg-4">
                        <label for="city">Ville</label>
                        <select class="form-control" name="city_id">
                            @foreach($cities as $city)
                                @if($city->id == $local->city_id)
                                    <option value="{{$city->id}}" selected="selected">{{ $city->label }}</option>
                                @else
                                    <option value="{{$city->id}}">{{ $city->label }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-12 col-lg-2">
                        <label for="zip">Code postal</label>
                        <input type="text" class="form-control" name="zip" value="{{ $local->zip }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-12 col-lg-4">
                        <label for="type_id">Type</label>
                        <select class="form-control" name="type_id">
                            @foreach($types as $type)
                                @if($type->id == $local->type_id)
                                    <option value="{{$type->id}}" selected="selected">{{ $type->label }}</option>
                                @else
                                    <option value="{{$type->id}}">{{ $type->label }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-12 col-lg-2">
                        <label for="capacity">Prix</label>
                        <input type="text" class="form-control" name="price" value="{{ $local->price }}">
                    </div>
                    <div class="form-group col-12 col-lg-2">
                        <label for="capacity">Capacité</label>
                        <input type="text" class="form-control" name="capacity" value="{{ $local->capacity }}">
                    </div>

                    <div class="form-group col-12 col-lg-2">
                        <label for="floor">Etage</label>
                        <input type="text" class="form-control" name="floor" value="{{ $local->floor }}">
                    </div>
                    <div class="form-group col-12 col-lg-2">
                        <label for="door">Porte</label>
                        <input type="text" class="form-control" name="door" value="{{ $local->door }}">
                    </div>

                </div>
            </div>
            <div class="col-3 text-center pl-5 border-left">
                <div class="form-group">
                    @if($local->image_url)
                        <img src="{{asset('storage').'/'.$local->image_url}}" class="img-thumbnail img-cover mb-2" width="200px" style="height: 200px !important" alt="">
                    @endif
                    <br/>
                    <label for="file">Image du local</label>
                    <input type="file" class="form-control-file" name="image_url">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
        <a href="" class="btn btn-danger">Supprimer</a>
    </form>

@endsection
