# Autenticando no GitHub para enviar os commits

O GitHub não permite o envio de commits utilizando a senha da conta. Para autenticar o `git push`, será utilizado um **Personal Access Token (PAT)**.

## Passo 1 — Criar um Personal Access Token

1. Acesse sua conta do GitHub.
2. Clique na foto do perfil e selecione **Settings**.
3. No menu lateral, acesse **Developer settings**.
4. Clique em **Personal access tokens** → **Tokens (classic)**.
5. Selecione **Generate new token (classic)**.
6. Defina um nome para o token e o período de validade.
7. Marque apenas a permissão:

```text
repo
```

8. Clique em **Generate token**.
9. Copie o token gerado e guarde-o em um local seguro.

> **Importante:** o token será exibido apenas uma vez. Caso seja perdido, será necessário gerar um novo.

---

## Passo 2 — Enviar os commits

Após realizar as alterações no projeto:

```bash
git add .

git commit -m "Descrição da alteração"

git push
```

Na primeira execução do `git push`, o Git solicitará as credenciais.

Digite seu usuário do GitHub quando solicitado:

```text
Username for 'https://github.com':
```

Em seguida, informe o **Personal Access Token** no lugar da senha:

```text
Password for 'https://github.com':
```

Cole o token e pressione **Enter**.

---

## Passo 3 — Não salvar as credenciais

Caso o sistema pergunte se deseja armazenar a senha ou o token permanentemente, escolha **Não**.

Dessa forma, nenhum outro usuário da máquina terá acesso às suas credenciais.

---

## Passo 4 — Encerrar a atividade

Ao final da aula:

* Faça o último `git push`;
* Feche o terminal;
* Apague a pasta do projeto, caso solicitado pelo professor.

Como as configurações do Git foram realizadas apenas no repositório, todas as informações serão removidas juntamente com a pasta do projeto.
