find . -iname "*.php" | xargs xgettext --from-code=UTF-8 -k_e -k_x -k__ -o messages.pot

