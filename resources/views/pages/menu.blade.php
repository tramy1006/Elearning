<div>
	<ul class="list-group" id="menu">

	  <li href="#" class="list-group-item menu1 active">
	        Menu
	    </li>
		 <div style="margin-top: 20px">
  		@foreach($cate as $category)
  		<ul>
			<div class="dropdown">
			  <a href="/cate/{{$category->id}}">{{$category->name}}</a>
			  <div class="dropdown-content">
			  	<ul>
			  	<li>
			    	<a href="/cate/list/level0/{{$category->id}}">Dễ</a>
			    </li>
			    <hr>
			    <li>
			    
			     	<a href="/cate/list/level1/{{$category->id}}">Trung bình</a>
			     </li>
			     <hr>
			     <li>
			      	<a href="/cate/list/level2/{{$category->id}}">Khó</a>
			     </li>
			     </ul>
			  </div>
			</div>
		</ul>
		<hr>
	      
				 
	    @endforeach
	       </div>             
	</ul>



</div>
