<?php

namespace App\Http\Livewire;

use App\Models\Node;
use Livewire\Component;


class SearchNodes extends Component
{
    public $search_node, $position, $result = false, $nodeData, $nodeTree, $childrens;
    public function render()
    {
        return view('livewire.search-nodes');
    }

    public function searchNode()
    {
        $this->validate([
            'search_node' => 'required',
            'position' => 'required'
        ]);

        $node = Node::with('children','parent','childrenRecursive')->where('name', $this->search_node);
        // $first_node = Node::first();
        // if($this->position && $first_node->name != ucfirst($this->search_node)){
        //     // $node->where('position', $this->position);
        // }
        $node = $node->first();
        // dd($node);

        if ($node) {
            $this->result = true;
            $this->nodeData = $node;
            $this->nodeTree = $node->childrenRecursive;
            if($this->position){
            $this->childrens = $this->nodeTree->where('position', $this->position)->first()->name;
            }
        } else {
            $this->result = true;
        }

        // dd($this->childrens, $this->position, $this->nodeTree, $this->nodeData, $this->result);
    }
}
