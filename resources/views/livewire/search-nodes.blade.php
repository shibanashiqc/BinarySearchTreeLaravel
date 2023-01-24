<div>
    {{--  1) The task is to find a node in the binary tree.  --}}

    <form wire:submit.prevent="searchNode">
        <div class="row">
        <div class="col-md-6">
        <div class="form-group">
            <label for="search">Search Node</label>
            <input type="text" wire:model="search_node" class="form-control" placeholder="Search Node">
            @error('search_node')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        </div>

        <div class="col-md-6">
            <br>
        <div class="form-group">
           <input type="radio" wire:model="position" value="L"> Left <br>
           <input type="radio" wire:model="position" value="R"> Right <br>

            @error('position')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        </div>

        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>


    <br>
    <br>
    @if($result)
            @if($nodeData)
                <div class="alert alert-success mt-3">
                    <h4>Node Found</h4>
                    <p>Node: {{ $nodeData->name }}</p>

                    @if($nodeData->parent)
                    <br>
                    <h4>Parent Node</h4>
                    <p>Parent Node: {{ $nodeData->parent->name ?? 'N.A' }}</p>
                    @endif

                    <br>
                    <h4>Last Children Node</h4>
                    @if($end_node_with_position)
                    {{--  <br>
                    <h4>Children Node</h4>
                    <p>Position: {{ $position }}</p>
                    <p>Child: {{ $childrens ?? 'N.A' }}</p>  --}}

                    <p>Position: {{ $position }}</p>
                    <p>Last Child: {{ $end_node_with_position ?? 'N.A' }}</p>

                    @else
                    <p>Position: {{ $position }}</p>
                    <p>Child: {{ $childrens ?? 'N.A' }}</p>
                    @endif




                </div>
            @else
            <div class="alert alert-danger mt-3">
                <h4>Node Not Found</h4>
                <p>Node: {{ $search_node }}</p>
            </div>
            @endif
        @endif

        <br>

        @if($nodeData)
        <h3>Tree View</h3>
                    <div class="tree">
                        <ul>
                            <li>
                                <a href="#">{{ $nodeData->name }}</a>
                                @if (count($nodeTree))
                                    @include('children', ['children' => $nodeTree])
                                @endif
                            </li>
                        </ul>
                    </div>
        @endif



</div>
