<?php
                    if(isset($result)){
                        $len = count($result);
                    echo "<div class='well'><p>";

                    foreach ($result as $abc){
                        echo $abc."<br />";
                    }
                    echo "</p></div>";
                    }
