<?php

namespace App\Http\Livewire;

use App\Models\Node;
use Livewire\Component;


class SearchNodes extends Component
{
    public $search_node, $position, $result = false, $nodeData, $nodeTree, $childrens, $end_node_with_position;
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

        if ($node) {
            $this->result = true;
            $this->nodeData = $node;
            $this->nodeTree = $node->childrenRecursive;
            if($this->position){
            $this->childrens = count($this->nodeTree) > 0 ? $this->nodeTree->where('position', $this->position)->first()->name : null;
            $last_nodes = count($this->nodeTree) > 0 ? $this->nodeTree->where('position', $this->position)->last()->end_of_child($this->position) : null;
            $last_node_name = '';
            if($last_nodes){
               if($last_nodes->childrenRecursive->where('position', $this->position)->count() > 0){
                foreach($last_nodes->childrenRecursive->where('position', $this->position) as $last_node){
                    $last_node_name = $last_node->name;
                }
               }else{
                $last_node_name = $last_nodes->name;
               }
            }
            $this->end_node_with_position = $last_node_name;
            }
        } else {
            $this->result = true;
            $this->nodeData = null;
        }

        // dd($this->childrens, $this->position, $this->nodeTree, $this->nodeData, $this->result);
    }
}
