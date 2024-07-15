
<?php

    // Number of teams in each pool
    $teamsPerPool = 12;

    // Generate teams for Pool 1 and Pool 2
    $pool1 = [];
    $pool2 = [];

    for ($i = 1; $i <= $teamsPerPool; $i++) {
        $pool1[] = "Pool1_Team" . $i;
        $pool2[] = "Pool2_Team" . $i;
    }

    // Function to generate round-robin matches for a given pool
    function generateRoundRobinMatches($teams) {
        $matches = [];
        $numTeams = count($teams);

        for ($i = 0; $i < $numTeams - 1; $i++) {
            for ($j = $i + 1; $j < $numTeams; $j++) {
                $matches[] = [$teams[$i], $teams[$j]];
            }
        }

        return $matches;
    }

    // Generate matches for Pool 1 and Pool 2
    $matchesPool1 = generateRoundRobinMatches($pool1);
    $matchesPool2 = generateRoundRobinMatches($pool2);

    // Function to simulate knockout stage
    function generateKnockoutStage($pool1, $pool2) {
        // For simplicity, we take the top 4 teams from each pool
        $topTeamsPool1 = array_slice($pool1, 0, 4);
        $topTeamsPool2 = array_slice($pool2, 0, 4);

        // Quarter-finals
        $quarterFinals = [
            [$topTeamsPool1[0], $topTeamsPool2[3]],
            [$topTeamsPool1[1], $topTeamsPool2[2]],
            [$topTeamsPool1[2], $topTeamsPool2[1]],
            [$topTeamsPool1[3], $topTeamsPool2[0]]
        ];

        // Semi-finals
        $semiFinals = [
            ["Winner of QF1", "Winner of QF2"],
            ["Winner of QF3", "Winner of QF4"]
        ];

        // Final
        $final = [["Winner of SF1", "Winner of SF2"]];

        return [$quarterFinals, $semiFinals, $final];
    }

    // Generate knockout stage matches
    list($quarterFinals, $semiFinals, $final) = generateKnockoutStage($pool1, $pool2);

    // Output the schedule
    echo "Round-Robin Matches (Pool 1):\n";
    foreach ($matchesPool1 as $match) {
        echo $match[0] . " vs " . $match[1] . "\n";
    }

    echo "\nRound-Robin Matches (Pool 2):\n";
    foreach ($matchesPool2 as $match) {
        echo $match[0] . " vs " . $match[1] . "\n";
    }

    echo "\nQuarter-Finals:\n";
    foreach ($quarterFinals as $match) {
        echo $match[0] . " vs " . $match[1] . "\n";
    }

    echo "\nSemi-Finals:\n";
    foreach ($semiFinals as $match) {
        echo $match[0] . " vs " . $match[1] . "\n";
    }

    echo "\nFinal:\n";
    foreach ($final as $match) {
        echo $match[0] . " vs " . $match[1] . "\n";
    }


?>