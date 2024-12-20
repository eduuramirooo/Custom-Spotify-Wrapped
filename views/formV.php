
    <div class="col-md-6 col-md-offset-3" id="formSpotify">
        <form id="msform" action="/controller/busquedaSpotify.php" method="POST">
            <!-- progressbar -->
            <ul id="progressbar">
                <li class="active">Top 1</li>
                <li>Top 2</li>
                <li>Top 3</li>
            </ul>
            <!-- fieldsets -->
            <fieldset>
                <h2 class="fs-title">Cancion Top 1</h2>
                <input type="text" name="track" placeholder="Nombre de la Cancion"/>
                <input type="text" name="artist" placeholder="Artista"/>
                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            <fieldset>
            <h2 class="fs-title">Cancion Top 2</h2>
                <input type="text" name="tracka2" placeholder="Nombre de la Cancion"/>
                <input type="text" name="artista2" placeholder="Artista"/>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            <fieldset>
            <h2 class="fs-title">Cancion Top 3</h2>
            <input type="text" name="track3" placeholder="Nombre de la Cancion"/>
            <input type="text" name="artist3" placeholder="Artista"/>
            <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
            <input type="submit" name="submit" class="submit action-button" value="Submit"/>
        </fieldset>

        </form>
    </div>
<?php
if(isset($_GET['track'])) {
    echo "<h2>Canción: " . $_GET['track'] . "</h2>";
    echo "<h2>Artista: " . $_GET['artist'] . "</h2>";
    echo "<img src='" . $_GET['image'] . "' alt='Portada del álbum' width='200'>";
    echo "<script>document.getElementById('formSpotify').style.display = 'none';</script>";
}

