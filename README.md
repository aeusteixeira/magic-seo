
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
$metaTags->setTitle("Magic SEO");
$metaTags->setDescription("Biblioteca PHP para gerar tags de SEO automaticamente");
$metaTags->setKeywords("magic seo, seo automatic com php");
$metaTags->setAuthor("Matheus Teixeira");
$metaTags->setPublicationDate("07/06/2023");
```  

4 - Gere as meta tags usando o método `generateAllTags()`:

```php
$tags = $metaTags->generateAllTags();
echo $tags;
```  
Exemplo completo:
```php
use Aeusteixeira\MagicSeo\MetaTags\MetaTagsGenerator;

$metaTags = new MetaTagsGenerator();
$metaTags->setTitle("Magic SEO");
$metaTags->setDescription("Biblioteca PHP para gerar tags de SEO automaticamente");
$metaTags->setKeywords("magic seo, seo automatic com php");
$metaTags->setAuthor("Matheus Teixeira");
$metaTags->setPublicationDate("07/06/2023");
// Defina outros atributos conforme necessário

$tags = $metaTags->generateAllTags();
echo $tags;
```  
Isso irá gerar as meta tags HTML adequadas para a página, que você pode incluir no `<head>` do seu arquivo HTML.

## Geração de Robots.txt
Para gerar o arquivo robots.txt, siga os passos abaixo:
 
1 - Importe a classe `RobotsTxtGenerator` em seu arquivo PHP:

```php
use Aeusteixeira\MagicSeo\RobotsTxt\RobotsTxtGenerator;` 
``` 
2 - Crie uma instância da classe `RobotsTxtGenerator`:

```php
$robotsTxt = new RobotsTxtGenerator();
``` 
3 - Defina as instruções para os motores de busca, como quais páginas eles podem ou não indexar:

```php
$robotsTxt->addUserAgent('*');
$robotsTxt->allow('/pasta-publica/');
$robotsTxt->disallow('/pasta-privada/');
// Adicione outras instruções conforme necessário` 
``` 
4 - Gere o conteúdo do arquivo robots.txt usando o método `generateContent()`:

```php
$content = $robotsTxt->generateContent();
echo $content;` 
``` 
Exemplo completo:
```php
use Aeusteixeira\MagicSeo\RobotsTxt\RobotsTxtGenerator;

$robotsTxt = new RobotsTxtGenerator();
$robotsTxt->addUserAgent('*');
$robotsTxt->allow('/pasta-publica/');
$robotsTxt->disallow('/pasta-privada/');
// Adicione outras instruções conforme necessário

$content = $robotsTxt->generateContent();
echo $content;
``` 
Isso irá gerar o conteúdo do arquivo robots.txt com as instruções definidas, que você pode salvar em um arquivo físico chamado "robots.txt".

## Licença
MagicSEO é um software de código aberto licenciado sob a [licença MIT](https://opensource.org/licenses/MIT).