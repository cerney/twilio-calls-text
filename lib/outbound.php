<?php
$agentNumber = $_GET['agentNumber'];
header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
    <Dial>
        <Number url="screen_for_machine.php">
            <?php echo $agentNumber; ?>
        </Number>
    </Dial>
    <Say>The call failed or the agent hung up. Goodbye.</Say>
</Response>