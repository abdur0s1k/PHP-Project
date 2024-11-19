<?php

class GeneticAlgorithm
{
    // Генерация случайной хромосомы
    public function generate(int $length): string
    {
        return implode('', array_map(fn() => random_int(0, 1) === 0 ? '0' : '1', range(1, $length)));
    }

    // Рулетка для выбора родителя на основе фитнеса
    public function select(array $population, array $fitnesses): string
    {
        $sum = array_sum($fitnesses);
        $threshold = lcg_value() * $sum;
        $cumulative = 0;

        foreach ($population as $i => $chromosome) {
            $cumulative += $fitnesses[$i];
            if ($cumulative >= $threshold) {
                return $chromosome;
            }
        }

        return end($population); // Возвращаем последний элемент, если не найдено
    }

    // Мутация хромосомы с вероятностью probability
    public function mutate(string $chromosome, float $probability): string
    {
        return implode('', array_map(
            fn($bit) => lcg_value() < $probability ? ($bit === '0' ? '1' : '0') : $bit,
            str_split($chromosome)
        ));
    }

    // Кроссовер между двумя хромосомами
    public function crossover(string $chromosome1, string $chromosome2): array
    {
        if (lcg_value() < 0.6) { // 60% вероятность кроссовера
            $crossoverPoint = random_int(1, strlen($chromosome1) - 1); // Точка разреза
            return [
                substr($chromosome1, 0, $crossoverPoint) . substr($chromosome2, $crossoverPoint),
                substr($chromosome2, 0, $crossoverPoint) . substr($chromosome1, $crossoverPoint)
            ];
        }
        return [$chromosome1, $chromosome2];
    }

    // Главный метод выполнения алгоритма
    public function run(
        callable $fitness,
        int $length,
        float $p_c,
        float $p_m,
        int $iterations = 100
    ): string {
        $populationSize = 100; // Размер популяции
        $population = array_map(fn() => $this->generate($length), range(1, $populationSize));

        for ($iter = 0; $iter < $iterations; $iter++) {
            // Оцениваем фитнес текущей популяции
            $fitnesses = array_map($fitness, $population);
            $newPopulation = [];

            while (count($newPopulation) < $populationSize) {
                // Выбираем двух родителей
                $parent1 = $this->select($population, $fitnesses);
                $parent2 = $this->select($population, $fitnesses);

                // Выполняем кроссовер
                [$child1, $child2] = $this->crossover($parent1, $parent2);

                // Добавляем детей с мутацией
                $newPopulation[] = $this->mutate($child1, $p_m);
                $newPopulation[] = $this->mutate($child2, $p_m);
            }

            // Обновляем популяцию
            $population = array_slice($newPopulation, 0, $populationSize);
        }

        // Возвращаем самую подходящую хромосому
        usort($population, fn($a, $b) => $fitness($b) <=> $fitness($a));

        return $population[0];
    }
}