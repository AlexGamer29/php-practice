<?php

// Sample XML data
$xmlData = <<<XML
<root>
    <person>
        <name>John Doe</name>
        <age>25</age>
        <city>New York</city>
    </person>
    <person>
        <name>Jane Doe</name>
        <age>30</age>
        <city>Los Angeles</city>
    </person>
</root>
XML;

// Using SimpleXML Parser
echo "Using SimpleXML Parser:\n";
$simpleXml = simplexml_load_string($xmlData);
foreach ($simpleXml->person as $person) {
    echo "Name: $person->name, Age: $person->age, City: $person->city\n";
}

// Using XML Expat Parser
echo "\nUsing XML Expat Parser:\n";
$parser = xml_parser_create();
xml_set_element_handler($parser, "startElement", "endElement");
xml_set_character_data_handler($parser, "characterData");

xml_parse($parser, $xmlData);
xml_parser_free($parser);

function startElement($parser, $element_name, $element_attrs) {
    echo "Start Element: $element_name\n";
}

function endElement($parser, $element_name) {
    echo "End Element: $element_name\n";
}

function characterData($parser, $data) {
    $data = trim($data);
    if (!empty($data)) {
        echo "Character Data: $data\n";
    }
}

?>
