{{-- edit category page --}}
<div class="container" style="padding:100px;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            修改課程分類
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('admin.categories')}}" class="btn btn-sucess pull-right">所有課程分類</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                    <form wire:submit.prevent="updateCategory">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-md-4 control-label">分類名稱</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Category Name" class="form-control input-md"
                                           wire:model="name" wire:keyup="generateslug"/>
                                    @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">課程分類網址</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Category Slug" class="form-control input-md"
                                           wire:model="slug"/>
                                    @error('slug')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">課程年級</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Category Grade" class="form-control input-md"
                                           wire:model="grade"/>
                                    @error('grade')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">更新</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
