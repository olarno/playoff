<?php

class team
{
    public $name;
    public $divisionTeam;
    public $players = [];
    public $averageScore = 0;

    public function __construct(string $name,  $divisionTeam)
    {
        $this->name = $name;
        $this->divisionTeam = $divisionTeam;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    public function getdivisionTeam()
    {
        return $this->divisionTeam;
    }
    public function setPlayers($players)
    {
        $this->players = $players;
        return $this;
    }
    public function getPlayers()
    {
        return $this->players;
    }
    public function getAverageScore()
    {
        return $this->averageScore;
    }
    public function setAverageScore($averageScore)
    {
        $this->averageScore = $averageScore;
        return $this;
    }

    // adding all value of cotation and get the average score
    public static function averageScore($players)
    {
        $maxScore = 0;
        foreach ($players as $key => $player) {
            $maxScore += $player->getCotation();
        }
        $averageScore = $maxScore / 21;
        return round($averageScore, 2);
    }

    // generate match between two teams
    public static function match($team1, $team2)
    {
        // init score
        $team1Score = 0;
        $team2Score = 0;

        for ($i = 0; $i <= 6; $i++) {
            $score_team_1 = mt_rand(($team1->getAverageScore() * 100), 100) / 100;
            $score_team_2 = mt_rand(($team2->getAverageScore() * 100), 100) / 100;

            if ($score_team_1 < $score_team_2) {
                $team1Score++;
            } else {
                $team2Score++;
            }

            // if a team has 4 wins it's close
            if ($team1Score == 4 || $team2Score == 4) {
                break;
            }
        }

        if ($team1Score > $team2Score) {
            $result = [
                [$team1 , $team1Score],
                [$team2 , $team2Score],
            ];
        } else {
            $result = [
                [$team2 , $team2Score],
                [$team1 , $team1Score],
            ];
    
        }

       
        return $result;
    }
}
