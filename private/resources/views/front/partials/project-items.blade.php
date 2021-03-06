 <div id="project-items-rightside" > 
    @foreach($projects as $project) 
        <div class="col-md-4">
           <a href="{{ url(getItemSlugLink('project', $project)) }}">
               <figure>
                   {{ HTML::image('img/dyn-contens/'. $project->img, languageTransform($project, 'title'), array('class' => 'img-responsive center-block')) }}
                   <figcaption class="text-center">
                       <p>
                           {{languageTransform($project, 'title')}}  
                       </p>
                   </figcaption>
               </figure>
           </a>
        </div>
    @endforeach   
 </div>
<div class="clearfix"></div>
<div class="row text-center">
    {{$projects->links()}}
</div>                                                                                                                                                                                                                                                                                                                                                                                                                                             