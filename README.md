This action allow you to test your module on validator PrestaShop

You need to replace the inputs commands:

```
      - name: send module to validator
        uses: PrestaShopCorp/github-action-validator@dev
        env:
            VALIDATOR_API_KEY: VALIDATOR_API_KEY
        with:
            github_link: orga/repoName
            github_branch: currentBranch
            or
            archive: path/to/file
```