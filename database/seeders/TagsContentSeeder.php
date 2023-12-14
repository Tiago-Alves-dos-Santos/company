<?php

namespace Database\Seeders;

use App\Facade\ServiceFactory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagsContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tag = ServiceFactory::createTag();
        $dataTag = [
            [
                'title' => 'TAG_HERO',
                'surname' => 'Conteudo do card grande',
            ],
            [
                'title' => 'TAG_ABOUT',
                'surname' => "Conteúdo que fala sobre a empresa 'Quem somos nós' ",
            ],
            [
                'title' => 'TAG_VALUES',
                'surname' => 'Carsd com os 3 valores positivos principais',
            ],
            [
                'title' => 'TAG_COUNTS',
                'surname' => 'Contagem de clientes, projetos, horas de suporte e quantidade de trabalhadores',
            ],
            [
                'title' => 'TAG_FEATURES',
                'surname' => '6 checkpoints sobre nossos recursos',
            ],
            [
                'title' => 'TAG_FEATURES_TAB',
                'surname' => '3 tabs com textos sobre algo sa empresa',
            ],
            [
                'title' => 'TAG_FEATURES_MOBILE',
                'surname' => 'Imagen de um celualar com 6 itens a serem descritos',
            ],
            [
                'title' => 'TAG_PRICING',
                'surname' => 'Inicialmente 4 cards sobre preços',
            ],
            [
                'title' => 'TAG_FAQ',
                'surname' => 'Inicialmente 6 perguntas frequetemente perguntadas e suas respostas',
            ],
        ];
        $objects = $tag->createMany($dataTag);
        $json = null;
        foreach ($objects->tags as $key => $value) {
            switch ($value->title) {
                case 'TAG_HERO':
                    $json = [
                        'title' => 'Oferecemos soluções modernas para o crescimento do seu negócio',
                        'sub_title' => 'Somos uma equipe de designers, desenvolvedores talentosos que criam sites,sistemas e aplicativos para seu negócio',
                        'button' => [
                            'visible' => true,
                            'text' => 'Saber mais',
                            'link' => '#about'
                        ]
                    ];
                    break;
                case 'TAG_ABOUT':
                    $json = [
                        'title' => 'QUEM SOMOS NÓS',
                        'sub_title' => 'Inovação Tecnológica Personalizada para Transformar Seu Negócio',
                        'text' => 'Soluções Software é uma empresa inovadora no setor de tecnologia, especializada no desenvolvimento de soluções sob medida para atender às necessidades de seus clientes. Com uma equipe apaixonada por tecnologia e criatividade, nos destacamos na criação e implementação de sites, sistemas web intuitivos, robustos aplicativos desktop e experiências móveis que impulsionam os negócios dos nossos clientes. Nossa abordagem centrada no cliente e nosso compromisso com a excelência técnica nos capacitam a oferecer produtos e serviços de alta qualidade, alinhados com as mais recentes tendências do mercado.',
                        'button' => [
                            'visible' => false,
                            'text' => 'Saber mais',
                            'link' => ''
                        ]
                    ];
                    break;
                case 'TAG_VALUES':
                    $json = [
                        'title' => 'NOSSO VALORES',
                        'sub_title' => 'Nossos Valores Moldam Nossa Jornada',
                        [
                            'title' => 'Compromisso com a Excelência',
                            'text' => 'Buscamos incessantemente a Excelência em cada detalhe do nosso trabalho, visando superar expectativas e oferecer resultados excepcionais.',
                        ],
                        [
                            'title' => ' Inovação Constante',
                            'text' => 'Mantemo-nos em constante evolução, explorando novas possibilidades e ideias para desenvolver soluções inovadoras e alinhadas com o futuro.',
                        ],
                        [
                            'title' => 'Parceria e Confiança',
                            'text' => 'Construímos relações sólidas baseadas na confiança mútua e parcerias duradouras, priorizando a transparência e a colaboração em todos os projetos.',
                        ],
                    ];
                    break;
                case 'TAG_COUNTS':
                    $json = [
                        [
                            'data' => 10,
                            'text' => 'Clientes'
                        ],
                        [
                            'title' => 2,
                            'text' => 'Projetos'
                        ],
                        [
                            'title' => '8 h/d',
                            'text' => 'Suporte de segunda a sexta'
                        ],
                        [
                            'title' => 10,
                            'text' => 'Trabalhadores'
                        ],
                    ];
                    break;
                case 'TAG_FEATURES':
                    $json = [
                        'title' => 'Recursos e Funcionalidades',
                        [
                            'text' => 'Intuitivo'
                        ],
                        [
                            'text' => 'Personalizado'
                        ],
                        [
                            'text' => 'Confiável'
                        ],
                        [
                            'text' => 'Escalável'
                        ],
                        [
                            'text' => 'Seguro'
                        ],
                        [
                            'text' => 'Eficiente'
                        ],
                    ];
                    break;
                case 'TAG_FEATURES_TAB':
                    $json = [
                        'title' => ' Potencialize sua Empresa com Nossos Recursos',
                        [
                            'title' => 'Integração Perfeita',
                            'text' => 'Oferecemos integração intuitiva e sem complicações, permitindo que nossas soluções se encaixem perfeitamente nas necessidades do seu negócio.'
                        ],
                        [
                            'title' => 'Design Personalizado',
                            'text' => 'Nossas soluções são desenvolvidas com um design personalizado, atendendo especificamente às suas exigências visuais e funcionais.'
                        ],
                        [
                            'title' => 'Segurança Avançada',
                            'text' => 'Priorizamos a segurança em cada etapa do desenvolvimento, garantindo proteção robusta para os dados dos nossos clientes e usuários.'
                        ],

                    ];
                    break;
                case 'TAG_FEATURES_MOBILE':
                    $json = [
                        'title' => 'Tecnologia Móvel para Transformar Negócios',
                        [
                            'title' => 'Acesso a Qualquer Hora e Lugar',
                            'text' => 'Facilitamos o acesso aos recursos do seu negócio em tempo real, permitindo que você esteja conectado onde quer que esteja.'
                        ],
                        [
                            'title' => 'Versatilidade em Mobilidade',
                            'text' => 'Oferecemos soluções móveis versáteis e adaptáveis para dispositivos variados, mantendo a consistência e eficácia em diferentes plataformas.'
                        ],
                        [
                            'title' => 'Personalização Sob Medida',
                            'text' => 'Proporcionamos soluções móveis personalizadas para atender suas necessidades específicas, destacando a singularidade do seu negócio.'
                        ],
                        [
                            'title' => 'Eficiência Garantida',
                            'text' => 'Garantimos soluções móveis eficientes, otimizadas para oferecer um desempenho superior e uma experiência sem complicações.'
                        ],
                        [
                            'title' => 'Experiência Intuitiva do Usuário',
                            'text' => 'Oferecemos uma experiência de usuário fluida e intuitiva, simplificando interações e garantindo uma navegação descomplicada.'
                        ],
                        [
                            'title' => 'Inovação Constante em Dispositivos Móveis',
                            'text' => 'Buscamos constantemente inovações em tecnologia móvel para manter seu negócio atualizado e alinhado com as últimas tendências.'
                        ],

                    ];
                    break;
                case 'TAG_PRICING':
                    $json = [
                        'title' => 'Escolha o Plano Ideal para Você',
                        [
                            'title' => 'Plano Básico',
                            'functionalities' => [
                                'Hospedagem limitada',
                                'Suporte por e-mail',
                                'Funcionalidade básica de design',
                                'Segurança padrão',
                                '30 dias de backup',
                                'Relatório mensal'
                            ],
                            'price' => '100.00',
                            'button' => [
                                'visible' => false,
                                'text' => 'Comprar'
                            ]
                        ],
                        [
                            'title' => 'Plano Pró',
                            'functionalities' => [
                                'Hospedagem limitada',
                                'Suporte por e-mail',
                                'Funcionalidade básica de design',
                                'Segurança padrão',
                                '30 dias de backup',
                                'Relatório mensal'
                            ],
                            'price' => '200.00',
                            'button' => [
                                'visible' => false,
                                'text' => 'Comprar'
                            ]
                        ],
                        [
                            'title' => 'Plano Premium',
                            'functionalities' => [
                                'Hospedagem limitada',
                                'Suporte por e-mail',
                                'Funcionalidade básica de design',
                                'Segurança padrão',
                                '30 dias de backup',
                                'Relatório mensal'
                            ],
                            'price' => '300.00',
                            'button' => [
                                'visible' => false,
                                'text' => 'Comprar'
                            ]
                        ],
                        [
                            'title' => 'Plano Ultimate',
                            'functionalities' => [
                                'Hospedagem limitada',
                                'Suporte por e-mail',
                                'Funcionalidade básica de design',
                                'Segurança padrão',
                                '30 dias de backup',
                                'Relatório mensal'
                            ],
                            'price' => '400.00',
                            'button' => [
                                'visible' => false,
                                'text' => 'Comprar'
                            ]
                        ],
                    ];
                    break;
                case 'TAG_FAQ':
                    $json = [
                        'title' => 'Perguntas Frequentes sobre Nossos Serviços',
                        'sub_title' => 'Encontre Respostas para Suas Dúvidas Mais Comuns',
                        [
                            'question' => 'Quais serviços a Soluções Software oferece?',
                            'answer' => 'Oferecemos uma variedade de serviços, incluindo desenvolvimento de websites, sistemas web, aplicativos móveis e desktop, além de soluções em marketing digital.'
                        ],
                        [
                            'question' => 'Como posso solicitar um orçamento para um projeto?',
                            'answer' => 'Entre em contato conosco por meio do nosso formulário online ou diretamente por telefone para discutir suas necessidades e obter um orçamento personalizado.'
                        ],
                        [
                            'question' => 'Quanto tempo leva para desenvolver um projeto?',
                            'answer' => 'O tempo de desenvolvimento varia de acordo com a complexidade do projeto. Estamos comprometidos em entregar soluções de qualidade dentro de prazos razoáveis.'
                        ],
                        [
                            'question' => 'A Soluções Software oferece suporte pós-lançamento?',
                            'answer' => ' Sim, nosso suporte está incluso na mensalidade do serviço contratado. Estamos disponíveis de segunda a sábado para auxiliar e garantir que tudo funcione conforme o esperado após o lançamento do projeto'
                        ],
                        [
                            'question' => 'Vocês realizam projetos personalizados?',
                            'answer' => 'Sim, desenvolvemos soluções personalizadas de acordo com as necessidades específicas de cada cliente, buscando atender suas demandas de maneira única.'
                        ],
                        [
                            'question' => 'Como posso entrar em contato com o suporte técnico em caso de problemas?',
                            'answer' => 'Você pode entrar em contato conosco por telefone ou e-mail para obter assistência técnica de segunda a sábado. Mantemos um controle direto do atendimento para garantir uma resposta rápida e eficaz às suas necessidades.'
                        ],
                    ];
                    break;

                default:
                    $json = ['title' => "Tag {$value->title} sem json"];
                    break;
            }
            //register content
            $value->content()->update(['content' => json_encode($json)]);
        }
        ds()->clear();
    }
}
