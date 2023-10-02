<?php
$name = "Caroline Sampaio"; // string
$age = 24; // int
$salary_expectation = 3500.12; // float
$description = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia dolorem tenetur, veritatis tempora at eligendi reiciendis a, assumenda quo quisquam corrupti laboriosam aliquid numquam explicabo nobis perferendis corporis rem. Consectetur?";
$open_to_negotiation = true; // bool

$skills = ['HTML', 'CSS', 'Javascript', 'Vue.js'];
// $skills = array('HTML', 'CSS', 'Javascript', 'Vue.js');

$address = [
    'cep' => '01001-000',
    'city' => 'São Paulo',
    'state' => 'São Paulo',
    'street' => 'Praça da Sé',
    'neighborhood' => 'Sé',
    'number' => 1,
    'complement' => 'lado ímpar'
];

// $address['cep']

$contacts = (object) [
    'github' => 'https://github.com/CarolineSampaio',
    'phone' => '4002-8922',
    'linkedin' => 'https://www.linkedin.com/in/carolines-sampaio/',
];

$experiences = [
    [
        'company_name' => 'CDHU',
        'office' => 'estagiária',
        'period' => '19/11/2019 até 10/08/2021',
        'description' => 'Apoio ao desenvolvimento de projetos de urbanização, regularização de assentamentos precários, reassentamento e habitação de interesse social.'
    ],
    [
        'company_name' => 'CDHU',
        'office' => 'estagiária',
        'period' => '19/11/2019 até 10/08/2021',
        'description' => 'Apoio ao desenvolvimento de projetos de urbanização, regularização de assentamentos precários, reassentamento e habitação de interesse social.'
    ]
]

// $contacts->github
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #007BFF;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        h2 {
            font-size: 24px;
            margin-top: 20px;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        p {
            margin: 0;
        }

        ul {
            list-style-type: square;
            padding-left: 20px;
        }
    </style>
</head>

<body>
    <header>
        <h1><?php echo $name ?></h1>
        <p><?php echo "$address[street] - $address[number] - $address[neighborhood]"; ?></p>
        <p><?php echo "$address[cep] - $address[city] - $address[state]"; ?></p>
        <p>Github: <?php echo $contacts->github ?></p>
        <p>Linkedin: <?php echo $contacts->linkedin ?></p>
        <p>Telefone: <?php echo $contacts->phone ?></p><br>
        <p><?php echo $open_to_negotiation ? 'Aberta para negociações' : 'Fechada para negociações' ?></p>
    </header>

    <div class="container">
        <h2>Resumo Profissional</h2>
        <p><?php echo $description; ?></p>

        <h2>Experiência Profissional</h2>
        <ul>
            <?php
            foreach ($experiences as $experience) {
            ?>
                <li>
                    <p><strong><?php echo $experience['company_name'] ?></strong></p>
                    <p>Cargo: <?php echo $experience['office'] ?></p>
                    <p>Período: <?php echo $experience['period'] ?></p>
                    <p><?php echo $experience['description'] ?>.</p>
                </li>
            <?php
            }
            ?>
        </ul>

        <h2>Formação Acadêmica</h2>
        <ul>
            <li>
                <p><strong>Universidade São Judas Tadeu</strong></p>
                <p>Curso: Arquitetura e Urbanismo/p>
                <p>Ano de Conclusão: 2021</p>
            </li>
        </ul>

        <!-- Mostrando skills com foreach -->
        <h2>Habilidades Técnicas</h2>
        <ul>
            <?php
            foreach ($skills as $skill) {
                echo "<li>$skill</li>";
            }
            // unset($skill) "destrói" a variável pois se não, vaza do escopo;
            ?>
        </ul>

        <!-- Mostrando skills manualmente -->
        <h2>Habilidades Técnicas</h2>
        <ul>
            <li><?php echo $skills[0] ?></li>
            <li><?php echo $skills[1] ?></li>
            <li><?php echo $skills[2] ?></li>
            <li><?php echo $skills[3] ?></li>
        </ul>
    </div>
</body>

</html>