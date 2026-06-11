# Como Rodar o projeto no Apache

Para rodar o projeto no Apache, você precisa fazer alguns ajustes no projeto.

1 - Ajustar o método run() do arquivo Router.php
2 - Adicionar um arquivo .htaccess na raiz do projeto e na pasta public
3 - Ajustar o arquivo de configuração do projeto


## Ajustar o router para incluir a subpasta

O roteador do seu projeto (`Router.php`) lê a variável `$_SERVER['REQUEST_URI']` pra saber qual rota foi chamada (tipo `/jogadores`).

* Se rodarmos em **Subpasta** (algo como `http://localhost/projeto_integrador_apache/jogadores`), o roteador receberia `/projeto_integrador_apache/jogadores` e daria erro 404. 

* Nesse caso é necessário alterar o método `run()` do arquivo Router.php com uma lógica que permita detectar automaticamente se está rodando em subpasta e "limpar" a URL antes de processar. O conteúdo do método `run()` é esse: 

```php
public function run()
    {
        $uri  = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // Remove a pasta do projeto (caso esteja rodando em subpasta no Apache)
        $scriptDir = str_replace('/public', '', dirname($_SERVER['SCRIPT_NAME']));

        if ($scriptDir !== '/') {
            $uri = str_replace($scriptDir, '', $uri);
        }

        $uri = str_replace('/public', '', $uri);

        // Garante que a URI não fique vazia e comece com "/"
        if (empty($uri)) {
            $uri = '/';
        }
        if ($uri[0] !== '/') {
            $uri = '/' . $uri;
        }

        $method = strtolower($_SERVER['REQUEST_METHOD']);

        foreach ($this->routes as $route) {

            if ($route['route'] == $uri && $route['method'] == $method) {

                return $this->dispatch($route);
            }
        }

        http_response_code(404);
        exit('Rota não encontrada');
    }
```

### Como funciona o redirecionamento
Para que você não precise digitar `/public` na barra de endereços (tipo `http://localhost/projeto_integrador_apache/public/jogadores`), é necessário criar um arquivo `.htaccess` na **raiz do projeto** (`/var/www/html/projeto_integrador_apache/.htaccess`).

Ele redireciona todas as requisições para a pasta `public/`. O conteúdo dele é esse:

```apache
RewriteEngine On

# Redireciona tudo de forma silenciosa para a pasta public/
RewriteRule ^$ public/ [L]
RewriteRule ^((?!public/).*)$ public/$1 [L]
```

Na pasta `public/` deve ser criado um arquivo `.htaccess` que trata de mandar tudo pro `index.php`. O conteúdo dele é esse:

```apache
# Ativa o motor de reescrita do Apache
RewriteEngine On

# Impede que bisbilhoteiros vejam a lista de arquivos das pastas (o famoso "arreda daí")
Options -Indexes

# Se não for um arquivo de verdade (-f) e nem um diretório (-d)
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
# Manda tudo pro index.php pro roteador dar conta do trem
RewriteRule ^(.*)$ index.php [L,QSA]
```

### Ajuste no arquivo de configuração do seu projeto

Como você está acessando por subpasta na porta padrão (geralmente a porta `80` do Apache), você precisa ajustar o arquivo de configuração do seu projeto. 

Abra o arquivo `app/config/Config.php` e altere a linha 18:
```php
// De:
define('URL_BASE', 'http://localhost:8080');

// Para (caso use a porta padrão 80 do Apache):
define('URL_BASE', 'http://localhost/projeto_integrador_apache');
```
*(Se o seu Apache rodar em outra porta, como a 8080, mude para `http://localhost:8080/projeto_integrador_apache`)*.

### Habilitar o `mod_rewrite` e testar

Certifique-se de que o módulo de reescrita está ativo e reinicie o Apache:
```bash
sudo a2enmod rewrite
sudo systemctl restart apache2
```

Agora é só abrir o navegador e acessar:
```
http://localhost/projeto_integrador_apache/
```
ou
```
http://localhost/projeto_integrador_apache/jogadores
```


### Erro com sessões

É possível que você enfrente um erro com sessões ao rodar esse projeto no Apache. Isso pode ocorrer pois quando usamos o comando `php -S localhost:8080` o PHP cria uma sessão para seu usuário. 

Já quando usamos o Apache ele cria uma sessão própria pra ele (geralmente o usuário `www-data`). 

Nesse caso, o apache (ou vice-versa) tentar reutilizar uma sessão que já existe. A solução para isso é simples: 

Alternativa A: remova a sessao do seu navegador
Alternativa B: execute o comando abaixo para remover todas as sessões do sistema:

```bash
sudo rm -f /var/lib/php/sessions/sess_*
```

