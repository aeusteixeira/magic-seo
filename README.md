# MagicSEO
![enter image description here](https://raw.githubusercontent.com/aeusteixeira/magic-seo/master/public/logo.png)

MagicSEO é um pacote PHP desenvolvido para facilitar a otimização de sites para mecanismos de busca (SEO). Ele fornece uma série de ferramentas e funcionalidades que ajudam os desenvolvedores a implementar as melhores práticas de SEO em seus sites.

## Funcionalidades
- **Geração de Meta Tags:** MagicSEO pode gerar meta tags adequadas para cada página, incluindo título, descrição, palavras-chave, etc.

- **Geração de Robots.txt:** MagicSEO pode gerar um arquivo robots.txt que instrui os motores de busca sobre quais páginas eles podem ou não indexar.

## Como usar
1 - Instale o pacote usando o Composer:
```bash
composer require aeusteixeira/magic-seo
```
2 - Importe as classes e funções necessárias em seus arquivos PHP:
```php
use Aeusteixeira\MagicSeo\MetaTags\MetaTagsGenerator;
use Aeusteixeira\MagicSeo\RobotsTxt\RobotsTxtGenerator;
```
3 - Crie uma instância da classe desejada e use seus métodos para gerar os elementos de SEO necessários:
```php
// Geração de Meta Tags
$metaTagsGenerator = new MetaTagsGenerator(
                    'Título da Página',
                    'Descrição da Página',
                    'Palavras-chave da Página');
$tagTitulo = $metaTagsGenerator->gerarTagTitulo();
$tagDescricao = $metaTagsGenerator->gerarTagDescricao();
$tagPalavrasChave = $metaTagsGenerator->gerarTagPalavrasChave();

// Geração de Robots.txt
$robotsTxtGenerator = new RobotsTxtGenerator();
$robotsTxt = $robotsTxtGenerator->gerarRobotsTxt();
```
## Instalação

## Licença
MagicSEO é um software de código aberto licenciado sob a [licença MIT](https://opensource.org/licenses/MIT).