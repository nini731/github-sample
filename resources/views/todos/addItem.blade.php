<div class="row">
    <div class="col-12">
        <form method="post" action="{{route('add.issue')}}">
            <div class="row">
                <div class="col-10">
                    <div class="form-group">
                        <input
                            class="form-control"
                            id="issue"
                            name="issue"
                            value="{{old('issue')}}"
                            placeholder="Enter An Item Name"
                            type="text"
                            required
                        >
                    </div>
                </div>
                <div class="col-2">
                    <button class="btn btn-block btn-primary" type="submit">ADD</button>
                </div>
            </div>
            {{csrf_field()}}
        </form>
    </div>
</div>
