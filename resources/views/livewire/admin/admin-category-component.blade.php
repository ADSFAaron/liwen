{{-- category page css --}}
<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }

    </style>
    <div class="container" style="padding:100px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                所有課程分類
                            </div>
                            <div class="col-md-6" style="padding-bottom: 10px;">
                                <a href="{{route('admin.addcategory')}}" class="btn btn-success pull-right">新增課程分類</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Sessio::get('message')}}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>編號</th>
                                <th>課程名稱</th>
                                <th>課程網址</th>
                                <th>編輯/刪除</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->slug}}</td>
                                    <td>
                                        <a href="{{route('admin.editcategory',['category_slug'=>$category->slug])}}"><i
                                                class="fa fa-edit fa-2x"></i></a>
                                        <a href="#"
                                           onclick="confirm('確定要刪除這個課程?')||event.stopImmediatePropagation()"
                                           wire:click.prevent="deleteCategory({{$category->id}})"
                                           style="margin-left:10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$categories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
