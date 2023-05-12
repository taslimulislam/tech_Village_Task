<nav class="navbar navbar-expand-lg" style="background-color: aliceblue;">
   <div class="container">
     <a class="navbar-brand font-monospace" href="#">Tach Village</a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
     
     <div class="collapse navbar-collapse" id="navbarNavDropdown">
       <ul class="navbar-nav">
         <li class="nav-item">
           <a class="nav-link {{ request()->segment(1)==NULL?'active text-primary':'' }}" aria-current="page" href="/">Task 1</a>
         </li>
         <li class="nav-item">
           <a class="nav-link {{ request()->segment(1)=='task-2'?'active text-primary':'' }}" href="/task-2">Task 2</a>
         </li>
         
       </ul>
     </div>
   </div>
 </nav>