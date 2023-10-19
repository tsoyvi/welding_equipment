// Хранилище относящиеся к модальному окну для выбора способа сварки
// tsoyvi, 24.12.2021
//

export default ({
  state: {
    methodsWelding: [
      {
        name: 'РД',
        description: 'ручная дуговая сварка покрытыми электродами (111)',
        enabled: true
      },
      {
        name: 'РДВ',
        description: 'ванная ручная дуговая сварка покрытыми электродами',
        enabled: true
      },
      {
        name: 'РАД',
        description: 'ручная аргонодуговая сварка неплавящимся электродом (141)',
        enabled: true
      },
      {
        name: 'МАДП',
        description: 'механизированная аргонодуговая сварка плавящимся электродом (131)',
        enabled: true
      },
      {
        name: 'МП',
        description: 'механизированная сварка плавящимся электродом в среде активных газов и смесях (135)',
        enabled: true
      },
      {
        name: 'ААД',
        description: 'автоматическая аргонодуговая сварка неплавящимся электродом',
        enabled: true
      },
      {
        name: 'АПГ',
        description: 'автоматическая аргонодуговая сварка неплавящимся автоматическая сварка плавящимся электродом в среде активных газов и смесях',
        enabled: true
      },
      {
        name: 'ААДП',
        description: 'автоматическая аргонодуговая сварка плавящимся электродом',
        enabled: false
      },
      {
        name: 'АФ',
        description: 'автоматическая сварка под флюсом (12)',
        enabled: true
      },
      {
        name: 'МФ',
        description: 'механизированная сварка под флюсом',
        enabled: false
      },
      {
        name: 'МФВ',
        description: 'ванная механизированная сварка под флюсом',
        enabled: false
      },
      {
        name: 'МПС',
        description: 'механизированная сварка самозащитной порошковой проволокой (114)',
        enabled: false
      },

      {
        name: 'МПГ',
        description: 'механизированная сварка порошковой проволокой в среде активных газов (136)',
        enabled: false
      },
      {
        name: 'МПСВ',
        description: 'ванная механизированная сварка самозащитной порошковой проволокой',
        enabled: false
      },
      {
        name: 'МСОД',
        description: 'механизированная сварка открытой дугой легированной проволокой',
        enabled: false
      },
      {
        name: 'П',
        description: 'плазменная сварка (15)',
        enabled: false
      },
      {
        name: 'ЭШ',
        description: 'электрошлаковая сварка',
        enabled: true
      },

      {
        name: 'ЭЛ',
        description: 'электронно-лучевая сварка',
        enabled: false
      },

      {
        name: 'Г',
        description: 'газовая сварка (311)',
        enabled: true
      },
      {
        name: 'РДН',
        description: 'ручная дуговая наплавка покрытыми электродами',
        enabled: true
      },
      {
        name: 'РАДН',
        description: 'ручная аргонодуговая наплавка',
        enabled: true
      },
      {
        name: 'ААДН',
        description: 'автоматическая аргонодуговая наплавка',
        enabled: true
      },
      {
        name: 'АФЛН',
        description: 'автоматическая наплавка ленточным электродом под флюсом',
        enabled: false
      },
      {
        name: 'АФПН',
        description: 'автоматическая наплавка проволочным электродом под флюсом',
        enabled: false
      },
      {
        name: 'КТС',
        description: 'контактно-точечная сварка',
        enabled: true
      },
      {
        name: 'КСС',
        description: 'контактная стыковая сварка сопротивлением',
        enabled: false
      },
      {
        name: 'КСО',
        description: 'контактная стыковая сварка оплавление',
        enabled: true
      },
      {
        name: 'ВЧС',
        description: 'высокочастотная сварка',
        enabled: false
      },
      {
        name: 'ПАК',
        description: 'пайка',
        enabled: true
      },
      {
        name: 'НИ',
        description: 'сварка нагретым инструментом',
        enabled: true
      },
      {
        name: 'ЗН',
        description: 'сварка с закладными нагревателями',
        enabled: true
      },
      {
        name: 'НГ',
        description: 'сварка нагретым газом',
        enabled: false
      },
      {
        name: 'Э',
        description: 'экструзионная сварка',
        enabled: false
      }

    ]

  },

  getters: {
    METHODS_WELDING_LIST (state) {
      return state.methodsWelding
    }
  },

  mutations: {
  },

  actions: {
  }

})
