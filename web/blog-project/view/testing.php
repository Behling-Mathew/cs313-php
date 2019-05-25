
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home - Sports Blog</title>
    <meta name="description" content="This is the home page for UJF sports blog.">
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  </head>
  <body>
    <header>
    <h1 class="site-name">Sports Blog</h1>
      <nav>
      
      
     

      <!-- <button class="toggle-button" onclick="toggleMenu()">&#9776;</button>
      
      <div class="menu-outer" id="nav-bar-hide">
          
          <div class="table">
              
              <ul class="main-nav" id="nav-hide">
              
                  <li><a class="active" href="/acme/home.php" title="ACME Home Page">Home</a></li>
                  <li><a href="#" title="ACME Cannon Page">Cannon</a></li>
                  <li><a href="#" title="ACME Explosive Page">Explosive</a></li>
                  <li><a href="#" title="ACME Misc Page">Misc</a></li>
                  <li><a href="#" title="ACME Rocket Page">Rocket</a></li>
                  <li><a href="#" title="ACME Trap Page">Trap</a></li>
              </ul>
          </div>
      </div> -->
    </nav>
    </header>
    
    <main>
       

<style>
    body {
        max-width: 960px;
        
        margin-left: auto;
        margin-right: auto;
    }
   
    </style>


    <table id="example" class="table table-striped table-bordered" style="width:80%">
        <thead>
            <tr>
                <th>Portrait</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Team</th>
                <th>Salary</th>
                <th>Age</th>
            </tr>
        </thead>
        <tbody>
          <tr><td><img class="player-image" src="/blog-project/images/players/curry.png" alt="Player image of Stephen Curry"></td><td>Stephen</td><td>Curry</td><td>Golden State Warriors</td><td>$37,457,154</td><td>31</td></tr><tr><td><img class="player-image" src="/blog-project/images/players/davis.png" alt="Player image of Anthony Davis"></td><td>Anthony</td><td>Davis</td><td>New Orleans Pelicans</td><td>$25,434,263</td><td>26</td></tr><tr><td><img class="player-image" src="/blog-project/images/players/doncic.png" alt="Player image of Luka Doncic"></td><td>Luka</td><td>Doncic</td><td>Dallas Mavericks</td><td>$6,560,640</td><td>20</td></tr><tr><td><img class="player-image" src="/blog-project/images/players/durant.png" alt="Player image of Kevin Durant"></td><td>Kevin</td><td>Durant</td><td>Golden State Warriors</td><td>$30,000,000</td><td>30</td></tr><tr><td><img class="player-image" src="/blog-project/images/players/embiid.png" alt="Player image of Joel Embiid"></td><td>Joel</td><td>Embiid</td><td>Philadelphia 76ers</td><td>$25,467,250</td><td>25</td></tr><tr><td><img class="player-image" src="/blog-project/images/players/george.png" alt="Player image of Paul George"></td><td>Paul</td><td>George</td><td>Oklahoma City Thunder</td><td>$30,560,700</td><td>29</td></tr><tr><td><img class="player-image" src="/blog-project/images/players/giannis.png" alt="Player image of Giannis Antetokounmpo"></td><td>Giannis</td><td>Antetokounmpo</td><td>Milwaukee Bucks</td><td>$24,157,304</td><td>24</td></tr><tr><td><img class="player-image" src="/blog-project/images/players/gobert.png" alt="Player image of Rudy Gobert"></td><td>Rudy</td><td>Gobert</td><td>Utah Jazz</td><td>$23,241,573</td><td>26</td></tr><tr><td><img class="player-image" src="/blog-project/images/players/griffin.png" alt="Player image of Blake Griffin"></td><td>Blake</td><td>Griffin</td><td>Detroit Pistons</td><td>$32,088,932</td><td>30</td></tr><tr><td><img class="player-image" src="/blog-project/images/players/harden.png" alt="Player image of James Harden"></td><td>James</td><td>Harden</td><td>Houston Rockets</td><td>$30,431,854</td><td>29</td></tr><tr><td><img class="player-image" src="/blog-project/images/players/ingles.png" alt="Player image of Joe Ingles"></td><td>Joe</td><td>Ingles</td><td>Utah Jazz</td><td>$13,045,455</td><td>31</td></tr><tr><td><img class="player-image" src="/blog-project/images/players/irving.png" alt="Player image of Kyrie Irving"></td><td>Kyrie</td><td>Irving</td><td>Boston Celtics</td><td>$20,009,189</td><td>27</td></tr><tr><td><img class="player-image" src="/blog-project/images/players/kemba.png" alt="Player image of Kemba Walker"></td><td>Kemba</td><td>Walker</td><td>Charlotte Hornets</td><td>$12,000,000</td><td>29</td></tr><tr><td><img class="player-image" src="/blog-project/images/players/klay.png" alt="Player image of Klay Thompson"></td><td>Klay</td><td>Thompson</td><td>Golden State Warriors</td><td>$18,988,725</td><td>29</td></tr><tr><td><img class="player-image" src="/blog-project/images/players/lebron.png" alt="Player image of LeBron James"></td><td>LeBron</td><td>James</td><td>Los Angeles Lakers</td><td>$35,654,150</td><td>34</td></tr><tr><td><img class="player-image" src="/blog-project/images/players/leonard.png" alt="Player image of Kawhi Leonard"></td><td>Kawhi</td><td>Leonard</td><td>Toronto Raptors</td><td>$23,114,067</td><td>27</td></tr><tr><td><img class="player-image" src="/blog-project/images/players/lillard.png" alt="Player image of Damian Lillard"></td><td>Damian</td><td>Lillard</td><td>Portland Trailblazers</td><td>$27,977,689</td><td>28</td></tr><tr><td><img class="player-image" src="/blog-project/images/players/mitchell.png" alt="Player image of Donovan Mitchell"></td><td>Donovan</td><td>Mitchell</td><td>Utah Jazz</td><td>$3,111,480</td><td>22</td></tr><tr><td><img class="player-image" src="/blog-project/images/players/paul.png" alt="Player image of Chris Paul"></td><td>Chris</td><td>Paul</td><td>Houston Rockets</td><td>$35,654,150</td><td>34</td></tr><tr><td><img class="player-image" src="/blog-project/images/players/joker.png" alt="Player image of Nikola Jokic"></td><td>Nikola</td><td>Jokic</td><td>Denver Nuggets</td><td>$24,605,181</td><td>24</td></tr> 
        </tbody>
        <tfoot>
            <tr>
                <th>Portrait</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Team</th>
                <th>Salary</th>
                <th>Age</th>
            </tr>
        </tfoot>
    </table> 









      
    </main>
    <footer>
     
    </footer>
    <script src="/blog-project/js/hamburger.js"></script>    
  </body>
  <script>
  $(document).ready(function() {
    $('#example').DataTable();
} ); </script>
</html>